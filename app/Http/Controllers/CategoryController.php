<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categories;
    private $category;

    public function index()
    {
        // return view('admin.category.test');
        return view('admin.category.add');
    }

    public function create(Request $request)
    {
        // return $request;
        Category::storeCategory($request);
        return back()->with('message', 'Category info create successfully.');
    }

    public function manage()
    {
        $this->categories = Category::orderBy('id', 'desc')->get();
        return view('admin.category.manage', ['categories' => $this->categories]);
    }

    public function edit($id)
    {
        $category = Category::find($id);
        // return view('admin.category.edit', compact('category'));
        // return response()->json('hello');
        return response()->json($category);
    }

    public function update(Request $request, $id)
    {
        // return $id;
        // return $request;
        Category::storeCategory($request, $id);
        return back()->with('message', 'Category info update successfully.');
    }

    public function delete($id)
    {
        $this->category = Category::find($id);
        if (file_exists($this->category->image))
        {
            unlink($this->category->image);
        }
        $this->category->delete();
        return back()->with('message', 'Category info delete successfully.');
    }
}
