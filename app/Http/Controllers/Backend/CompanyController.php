<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyCreateRequest;
use App\Models\Backend\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function company()
    {
        $companies = Company::orderBy('id','DESC')->get();
        return view('admin.pages.product.company', compact('companies'));
    }



    public function addcompany()
    {
        return view('admin.pages.product.addcompany');
    }

    public function store(CompanyCreateRequest $request)
    {
        Company::create($request->all());
        return redirect(route('admin.company'))->with('message','Company added successfully!');
    }

    public function delete(Company $company)
    {
        $company->delete();
        return redirect(route('admin.company'))->with('message','Deleted Successfully');
    }


    public function editcompany()
    {
        return view('admin.pages.product.editcompany');
    }
}
