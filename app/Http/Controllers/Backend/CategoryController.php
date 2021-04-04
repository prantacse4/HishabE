<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category()
    {
        $categories = Category::orderBy('id','DESC')->get();
        return view('admin.pages.product.category', compact('categories'));
    }

    public function addcategory()
    {
        return view('admin.pages.product.addcategory');
    }


    public function store(Request $request)
    {
        //Validation
        $request->validate([
            'cat_name' => 'required|max:255|unique:categories,cat_name'

        ],[
            'cat_name.unique' => 'Name should be unique',
        ]);

        Category::create($request->all());
        return redirect(route('admin.category'))->with('message','Category added successfully!');
    }
    public function editcategory()
    {
        return view('admin.pages.product.editcategory');
    }

    public function delete(Category $category)
    {
        $category->delete();
        return redirect(route('admin.category'))->with('message','Deleted Successfully');
    }
}
