<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\SaveSaleRecords;

class SaleController extends Controller
{
    public function sale()
    {
        $records = SaveSaleRecords::orderBy('id','DESC')->get();
        return view('admin.pages.sale.sale', compact('records'));
    }
}
