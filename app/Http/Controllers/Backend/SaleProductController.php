<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Category;
use App\Models\Backend\Product;
use App\Models\Backend\Customer;
use App\Models\Backend\SaleProductTemp;
use Illuminate\Http\Request;

class SaleProductController extends Controller
{
    public function saleproduct()
    {
        $categories = Category::all();
        $products = Product::all();
        $temptabledata = SaleProductTemp::all();
        $customers = Customer::all();
        return view('admin.pages.sale.saleproduct', compact('products','categories','temptabledata', 'customers'));
    }


    public function getSaleProduct($id)
    {
        $products = Product::where('cat_id',$id)->pluck('pro_name', 'id');
        return json_encode($products);
    }

    public function getSaleCategory($id)
    {
        $cat_id = Product::where('id',$id)->pluck('cat_id');
        $category = Category::where('id',$cat_id)->pluck('cat_name', 'id');
        return json_encode($category);
    }

    public function getAllSaleProductDetails($id)
    {
        $productsdetails = Product::where('id',$id)->get();
        return json_encode($productsdetails);
    }
    public function getAllSaleProduct()
    {
        $products = Product::all()->pluck('pro_name', 'id');
        return json_encode($products);

    }
    public function getAllSaleCategory()
    {
        $categories = Category::all()->pluck('cat_name', 'id');
        return json_encode($categories);
    }

    public function postProductDetails(Request $request)
    {
        // dd($request);
        $temp = SaleProductTemp::create($request->all());
        return  response()->json($temp);

    }

    public function getTempSaleProduct()
    {
        $gettemps = SaleProductTemp::all();
        return  json_encode($gettemps);
    }

    public function getTempSaleProductDelete($id)
    {
        $SaleProductTempID = SaleProductTemp::find($id);
        if($SaleProductTempID){
            $SaleProductTempID->delete();
            $notify = 'Data Deleted';
            return response()->json($notify);
        }
        else{
            $er = 'Data Not Found';
            return response()->json($er);
        }
    }

    public function deleteTempSaleProduct($product_id)
    {
        $SaleProductTempID = SaleProductTemp::where('id',$product_id);
        if($SaleProductTempID){
            $SaleProductTempID->delete();
            $notify = 'Data Deleted';
            return response()->json($notify);
        }
        else{
            $er = 'Data Not Found';
            return response()->json($er);
        }
    }


}
