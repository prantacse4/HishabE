<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function Customer()
    {
        $customers = Customer::orderBy('id','DESC')->get();
        return view('admin.pages.customer.customer', compact('customers'));
    }

    public function addcustomer()
    {
        return view('admin.pages.customer.addcustomer');
    }


    public function store(Request $request)
    {
        //Validation
        $request->validate([
            'phone' => 'required|max:255|unique:customers,phone'

        ],[
            'phone.unique' => 'Phone no should be unique',
        ]);

        Customer::create($request->all());
        return redirect(route('admin.customer'))->with('message','Customer added successfully!');
    }
    public function editcustomer()
    {
        return view('admin.pages.customer.editcustomer');
    }

    public function delete(Customer $customer)
    {
        $customer->delete();
        return redirect(route('admin.customer'))->with('message','Deleted Successfully');
    }

    public function getCustomerDetails($id)
    {
        $customers = Customer::where('id',$id)->pluck('phone', 'id');
        return json_encode($customers);
    }

}
