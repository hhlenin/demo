<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class EcommerceController extends Controller
{
    private $categories;
    private $products;
    private $product;
    private $carousel;

    public function index()
    {
        $this->carousel = Carousel::latest()->get();
        $this->products = Product::orderBy('id', 'desc')->take(8)->get();
        return view('front.home.home', [
            'products'  => $this->products,
            'carousel' => $this->carousel,
        ]);
    }

    public function categoryProduct($id)
    {
        $this->products = Product::where('category_id', $id)->orderBy('id', 'desc')->get();
        return view('front.category.category-product', ['products' => $this->products]);
    }

    public function subCategoryProduct($id)
    {
        $this->products = Product::where('sub_category_id', $id)->orderBy('id', 'desc')->get();
        return view('front.category.sub-category-product', ['products' => $this->products]);
    }

    public function productDetail($id)
    {
        $this->product = Product::find($id);
        return view('front.product.detail', ['product' => $this->product]);
    }
}
