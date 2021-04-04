<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CompanyController;
use App\Http\Controllers\Backend\SaleController;
use App\Http\Controllers\Backend\SaleProductController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/getProducts/{id}', [SearchController::class, 'getProducts'])->name('getProducts');
Route::get('/getSaleCategory/{id}', [SearchController::class, 'getSaleCategory'])->name('getSaleCategorySearch');
Route::post('/search/fetch', [SearchController::class, 'fetch'])->name('search.fetch');
Route::post('/searchresult', [SearchController::class, 'searchresult'])->name('searchresult');






Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/login', [AdminController::class, 'loginpage'])->name('admin.loginpage');

    Route::get('/product', [ProductController::class, 'product'])->name('admin.product');
    Route::get('/product/add', [ProductController::class, 'addproduct'])->name('admin.addproduct');
    Route::post('/product/add/store', [ProductController::class, 'store'])->name('admin.addproduct.store');
    Route::delete('/product/delete/{product}', [ProductController::class, 'delete'])->name('admin.deleteproduct');
    Route::get('/product/edit', [ProductController::class, 'editproduct'])->name('admin.editproduct');

    Route::get('/category', [CategoryController::class, 'category'])->name('admin.category');
    Route::get('/category/add', [CategoryController::class, 'addcategory'])->name('admin.addcategory');
    Route::post('/category/add/store', [CategoryController::class, 'store'])->name('admin.addcategory.store');
    Route::delete('/category/delete/{category}', [CategoryController::class, 'delete'])->name('admin.deletecategory');
    Route::get('/category/edit', [CategoryController::class, 'editcategory'])->name('admin.editcategory');

    Route::get('/company', [CompanyController::class, 'company'])->name('admin.company');
    Route::get('/company/add', [CompanyController::class, 'addcompany'])->name('admin.addcompany');
    Route::post('/company/add/store', [CompanyController::class, 'store'])->name('admin.addcompany.store');
    Route::delete('/company/delete/{company}', [CompanyController::class, 'delete'])->name('admin.deletecompany');
    Route::get('/company/edit', [CompanyController::class, 'editcompany'])->name('admin.editcompany');


    
    Route::get('/customer', [CustomerController::class, 'customer'])->name('admin.customer');
    Route::get('/customer/add', [CustomerController::class, 'addcustomer'])->name('admin.addcustomer');
    Route::post('/customer/add/store', [CustomerController::class, 'store'])->name('admin.addcustomer.store');
    Route::delete('/customer/delete/{customer}', [CustomerController::class, 'delete'])->name('admin.deletecustomer');
    Route::get('/customer/edit', [CustomerController::class, 'editcustomer'])->name('admin.editcustomer');
    Route::get('/getcustomerdetails/{id}', [CustomerController::class, 'getCustomerDetails'])->name('admin.getcustomerdetails');


    Route::get('/sale', [SaleController::class, 'sale'])->name('admin.sale');



    Route::get('/saleproduct', [SaleProductController::class, 'saleproduct'])->name('admin.saleproduct');
    Route::get('/getSaleProduct/{id}', [SaleProductController::class, 'getSaleProduct'])->name('getSaleProduct');
    Route::get('/getSaleCategory/{id}', [SaleProductController::class, 'getSaleCategory'])->name('getSaleCategory');
    Route::get('/getAllSaleProduct', [SaleProductController::class, 'getAllSaleProduct'])->name('getAllSaleProduct');
    Route::get('/getAllSaleCategory', [SaleProductController::class, 'getAllSaleCategory'])->name('getAllSaleCategory');
    Route::get('/getAllSaleProductDetails/{id}', [SaleProductController::class, 'getAllSaleProductDetails'])->name('getAllSaleProductDetails');
    Route::get('/getTempSaleProduct', [SaleProductController::class, 'getTempSaleProduct'])->name('getTempSaleProduct');







});
