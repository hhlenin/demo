<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\OtherImage;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $product;
    public $products;
    public $categoryId;
    public $subCategories;


    public function index()
    {
        if (auth()->user() != null) {
            return view('admin.product.add', [
                'categories'        => Category::all(),
                'sub_categories'    => SubCategory::all(),
                'brands'            => Brand::all(),
                'units'             => Unit::all(),
            ]);
        } else {
            return view('customer.product.add', [
                'categories'        => Category::all(),
                'sub_categories'    => SubCategory::all(),
                'brands'            => Brand::all(),
                'units'             => Unit::all(),
            ]);
        }
        
    }

    public function getSubCategory()
    {
        $this->categoryId       = $_GET['bitm'];
        $this->subCategories    = SubCategory::where('category_id', $this->categoryId)->get();
        return response()->json($this->subCategories);
    }

    public function create(Request $request)
    {
        // return $request;
        $this->product = Product::newProduct($request);
        OtherImage::newOtherImage($request, $this->product->id);
        return back()->with('message', 'Product info create successfully.');
    }

    public function manage()
    {
        if (auth()->user() !=null){
            return view('admin.product.manage', [
                'products' => Product::orderBy('id', 'desc')->get()
            ]);
        } elseif (session()->get('customer_id')) {
            return view('customer.product.manage', [
                'products' => Product::orderBy('id', 'desc')->get()
            ]); 
        }
        
    }

    public function detail($id)
    {
        if (auth()->user() != null) {
            $this->product = Product::find($id);
            return view('admin.product.detail', ['product' => $this->product]);
        }
        else {
            $this->product = Product::find($id);
            return view('customer.product.detail', ['product' => $this->product]);
        }
    }

    public function edit($id)
    {
        if (auth()->user() != null) {
            return view('admin.product.edit', [
                'categories'        => Category::all(),
                'sub_categories'    => SubCategory::all(),
                'brands'            => Brand::all(),
                'units'             => Unit::all(),
                'product'           => Product::find($id)
            ]);
        }
         else {
            return view('customer.product.edit', [
            'categories'        => Category::all(),
            'sub_categories'    => SubCategory::all(),
            'brands'            => Brand::all(),
            'units'             => Unit::all(),
            'product'           => Product::find($id)
            ]);
         }
        ;
    }

    public function update(Request $request, $id)
    {
        Product::updateProduct($request, $id);
        if ($request->file('other_image')) {
            OtherImage::updateOtherImage($request, $id);
        }
        return back()->with('message', 'Product info update successfully.');
    }

    public function delete($id)
    {
        Product::deleteProduct($id);
        return back()->with('message', 'Product info delete successfully.');
    }
}
