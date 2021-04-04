<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Category;
use App\Models\Backend\Company;
use App\Models\Backend\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product()
    {
        $products = Product::orderBy('id','DESC')->get();
        return view('admin.pages.product.product', compact('products'));
    }

    public function addproduct()
    {
        $categories = Category::all();
        $companies = Company::all();
        return view('admin.pages.product.addproduct', compact('categories', 'companies'));
    }
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'pro_name' => 'required|max:255',
            'pro_code' => 'required|max:255',
            'cat_id' => 'required',
            'com_id' => 'required',
            'qty_type' => 'required',
            'pro_quantity' => 'required',
            'pro_purchasing' => 'required| regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
            'pro_mrp' => 'required| regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
            'pro_wholesale' => 'required| regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
            'pro_description' => 'required',

        ],[
            'pro_name.unique' => 'Product name is required',
            'cat_id.required' => 'Please select any category',
            'com_id.required' => 'Please select any company',
            'pro_quantity.required' => 'Please enter quantity of product',
            'pro_purchasing.regex' => 'Please enter purchasing price in float or integer',
            'pro_mrp.regex' => 'Please enter MRP in float or integer',
            'pro_wholesale.regex' => 'Please enter wholesale price in float or integer',

        ]);

        Product::create($request->all());
        return redirect(route('admin.product'))->with('message','Product added successfully!');
    }
    public function editproduct()
    {
        return view('admin.pages.product.editproduct');
    }

    public function delete(Product $product)
    {
        $product->delete();
        return redirect(route('admin.product'))->with('message','Deleted Successfully');
    }


}
