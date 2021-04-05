@extends('admin.layouts.saleproductlayout')

@section('pagename')
Sale Product
@endsection


@section('extracsscdn')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection


@section('saleproductsidebar')
@include('admin.sidebar.saleproductsidebar')
@endsection


@section('admincontent')





        <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Sale</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Sale</a></li>
                            <li class="breadcrumb-item active">Sale Product</li>
                        </ol>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->




                <!-- Main content -->
    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
        <!-- main body start from here -->
        <div class="card">
            <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="ptitle">
                                <h3>Sale</h3>
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{ route('admin.sale') }}" class="btn btn-success text-right addbtn">
                                    <span> Records</span>
                                </a>
                            </div>
                    </div>
            </div>

            <div class="card-body">
                <div class="contents">
                        <h3 class="headingc">Sale</h3>
                        <div class="d-flex">
                                    <div class="mr-auto p-2">
                                                <table class="table">
                                                    <tbody>
                                                    <tr>
                                                        <th scope="row">Sale Date</th>
                                                        <td><input class="form-control" value="<?php echo date("d / m / Y"); ?>" id="saleDate" readonly></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Sale Type</th>
                                                        <td>
                                                        <select name="sale_type" class="form-control  sale_type select2 select2-info" style="width:100%;" id="test" >
                                                            <option selected value="Regular" >Regular</option>
                                                            <option value="Wholesale" >Wholesale</option>
                                                        </select>
                                                        </td>
                                                    </tr>
                                                    <!-- All customers through allCustomers() function -->
                                                    <tr>
                                                        <th scope="row">Customer</th>
                                                        <td>
                                                        <select class="form-control select2 select2-info" style="width:100%;" id="customers" name="customers">
                                                            <option selected ="false" value="0">Select Customer</option>
                                                            @foreach ($customers as $customer)
                                                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Customer Mobile</th>
                                                        <td>
                                                        <input  class="form-control" type="text" id="mobile" placeholder ="Mobile no. (Include +880)">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Total Amount</th>
                                                        <td>
                                                        <input class="form-control" type="number" readonly placeholder="Total Amount" id="upTotalAmount" value="0">
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                        <div align="center">

                                            <button type="submit" id="finalSubmit" class="btn btn-info">Sale</button>
                        
                                        </div>
                                    </div>
                                    <div class="p-2">
                                                <table class="table">
                                                    <tbody>
                                                    <tr>
                                                        <th scope="row">Discount Type</th>
                                                        <td>
                                                            <select id="discountType" class="form-control select2 select2-info" style="width:100%;">
                                                            <option value="Amount" selected>Amount</option>
                                                            <option value="Perchantage">Perchantage</option>
                                                            </select>
                                                        </td>
                                                    </tr>

                                                    <!-- Validating total discount through totalDiscountValidation() function  -->
                                                    <tr>
                                                        <th scope="row">Total Discount</th>
                                                        <td>
                                                        <input id="totalDiscount" class="form-control" type="number" placeholder="Total Discount" value="0">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Discount Amount</th>
                                                        <td>
                                                        <input  class="form-control" type="text" id="discountAmount" Readonly placeholder="Discounted Amount">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Payable Amount</th>
                                                        <td>
                                                        <input  class="form-control" type="number" id="payableAmount" Readonly value="0">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Payment</th>
                                                        <td>
                                                        <input  class="form-control" type="number" id="payment" placeholder="Payment" value="0">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Due</th>
                                                        <td>
                                                        <input  class="form-control" type="text" id="due" Readonly placeholder="Due Amount">
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                    </div>
                        </div>
                </div>
                <br>


                <div class="contents">
                    <h3 class="headingc c2">Add Product to Sale</h3>
                    <div class="d-flex">
                        <div class="mr-auto p-2 p234">

                            <div class="protosale">

                            </div>

                            <div class="mr-auto  table-responsive p-0">
                                    {{-- <span id="error"></span> --}}
                                    <table class="table table table-hover table-striped table-head-fixed" id="item_table">
                                            <tbody>
                                            <thead>
                                            <tr>
                                                <th>&nbsp; &nbsp;</th>
                                                <th> <p>Category</p></th>
                                                <th><p>Products</p></th>
                                                <th><p>Stock</p></th>
                                                <th><p>Quantity</p></th>
                                                <th><p>Purchasing Price</p></th>
                                                <th><p>Selling Price</p></th>
                                                <th><p>Total Amount</p></th>
                                            </tr>
                                            </thead>

                                                <tr>
                                                <th scope="row"> </th>

                                                <!-- Showing all the available categories thorugh allCategories() function -->
                                                <td>
                                                <div class="form-group">

                                                    <select class="form-control select2 select2-info" name="category" style="width: 100%;" >
                                                        <option selected ="false" value="0">Select Category</option>
                                                        @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                </td>

                                                <!-- Showing all the available products of a selected category thorugh allProducts() function -->
                                                <td>
                                                <div class="form-group">
                                                    <select class="form-control select2 select2-info" name="product" id="product_name" style="width: 100%;"  >
                                                        <option selected ="false" value="0">Select Product</option>
                                                        @foreach ($products as $product)
                                                        <option value="{{ $product->id }}">{{ $product->pro_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    </select>
                                                </div>
                                                </td>

                                                <td>
                                                    <input type="text" class="form-control" id="pro_quantity" placeholder="Stock" readonly />
                                                </td>

                                                <!-- Checking the validity of Quantity through quantityValidation() function -->
                                                <td>
                                                    <input type="number" class="form-control" id="qty" placeholder="Quantity"/>
                                                </td>

                                                <!-- Updating purchase price every time through purchasePrice() function -->
                                                <td>
                                                    <input type="text" class="form-control"  id="pro_purchasing" readonly placeholder="Purchasing Price">
                                                </td>

                                                <!-- Checking the validity of selling price through sellingPriceValidation() function -->
                                                <td>
                                                    <input type="text" class="form-control" id="pro_selling" placeholder="Selling Price"/>
                                                </td>

                                                <!-- Setting totalAmount without any function -->
                                                <td>
                                                    <input readonly type="text" class="form-control" id="pro_total" placeholder="Total"/>
                                                </td>

                                                <!-- Adding a product -->
                                                <td><button id="addProduct" class="btn btn-success">Add</button></td>
                                                </tr>
                                            </tbody>

                                    </table>

                            </div>

                        </div>

                    </div>
                </div>
                <br>

                <div class="contents">
                        <h3 class="headingc c2">Sale Product List</h3>
                        <div class="d-flex">
                                    <div class="mr-auto  table-responsive p-0" style="max-height: 300px;" id="addedproductdetails">
                                        <table class="table table-hover table-striped table-head-fixed" >
                                            <thead>
                                              <tr class="mytablehead">
                                                <th scope="col">Product Name</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Purchasing Price</th>
                                                <th scope="col">Selling Price</th>
                                                <th scope="col">Total Amount</th>
                                                <th scope="col">Delete</th>
                                              </tr>
                                            </thead>



                                            <tbody id="showtempproduct">
                                                @foreach($temptabledata as $tempproduct)
                                                <tr id="tempproductid_{{ $tempproduct->id }}">
                                                    <td>{{ $tempproduct->product_name  }}</td>
                                                    <td>{{ $tempproduct->qty }}</td>
                                                    <td>{{ $tempproduct->pro_pur }}</td>
                                                    <td>{{ $tempproduct->pro_sell }}</td>
                                                    <td>{{ $tempproduct->total }}</td>
                                                    <td colspan="2">
                                                        <a href="javascript:void(0)" id="delete_temp_product" data-id="{{ $tempproduct->id }}" class="delete_temp_product"><i class="far fa-trash-alt"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                          </table>



                                    </div>

                        </div>
                </div>
                <br>

                
                <br>



            </div>
                                        <!-- /.card-body -->
        </div>
    </div>
    </section>
                <!-- /.content -->


</div>



        @endsection


        @section('extrajscdn')
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
        <script>
            $(function() {
                //Initialize Select2 Elements
                $('.select2').select2()
                    //Initialize Select2 Elements
                $('.select2bs4').select2({
                    theme: 'bootstrap4'
                })
            });
        </script>

<script>


$(document).ready(function ()
 {
var stateSaleType = $('select[name="sale_type"]').val();
var stateCustomerID = null;
var stateCustomerMobile = null;
var stateTotalAmount = 0.0;
var stateDiscountAmount = 0.0;
var statePayment=0.0;
var stateDue=0.0;
var statePayableAmount=0.0;
var saleDate = null;
var fullData = [
    {saleDate:saleDate, stateSaleType:stateSaleType, stateCustomerID:stateCustomerID, stateCustomerMobile:stateCustomerMobile, stateTotalAmount:stateTotalAmount, stateDiscountAmount:stateDiscountAmount, statePayment:statePayment, stateDue:stateDue, statePayableAmount:statePayableAmount  }
];
// Changing Amount type we will make all value 0


    $('#discountType').on('change',function(){
        var totalDiscount = 0.0;
        var discountAmount = 0.0;
        // var payableAmount = 0.0;
        initial_payableamount = $('#upTotalAmount').val();
        initial_payableamount = parseFloat(initial_payableamount);
        statePayableAmount = initial_payableamount;
        totalDiscount = $('#totalDiscount').val(totalDiscount);
        $('#payableAmount').val(initial_payableamount);
        discountAmount = $('#discountAmount').val(discountAmount);
        //Adding or Removing Payment
        var payment = 0.0;
        payment = $('#payment').val();
        payment = parseFloat(payment);
        statePayment = payment;
        
        if(payment>initial_payableamount || payment<0){
            $('#payment').addClass("danger_input");
        }
        else{
            $('#payment').removeClass("danger_input");
        }


        // payableAmount = $('#payableAmount').val(payableAmount);
    });
// Changing Amout type we will make all value 0




// Payment Input and Validate Payment
$('#payment').on('input',function(){
    var payable = $('#payableAmount').val();
    payable = parseFloat(payable);
    payment = $('#payment').val();
    payment = parseFloat(payment);
    if(payment>payable || payment<0){
        $('#payment').addClass("danger_input");
    }
    else{
        $('#payment').removeClass("danger_input");
    }


    //Due Count
    initial_payableamount = $('#upTotalAmount').val();
    initial_payableamount = parseFloat(initial_payableamount);
    var due = initial_payableamount-payment;
    
    statePayment = payment;
    if(due<0){
        due = initial_payableamount;

    }
    stateDue = due;
    $('#due').val(due);



});
// Payment Input and Validate Payment





// Input Total Discount Amount

    $('#totalDiscount').on('input',function(){
        var discountvaltype = $('#discountType').val();
        var totalamout = 0.0;
        totalamout = $('#upTotalAmount').val();
        totalamout = parseFloat(totalamout);
        var fi_getdiscount  =0.0;
        var initial_payableamount = totalamout;
        fi_getdiscount = $('#totalDiscount').val();
        fi_getdiscount = parseFloat(fi_getdiscount);
        var payment = 0.0;
        payment = $('#payment').val();
        payment = parseFloat(payment);

        



        if(discountvaltype == "Amount"){

            if(fi_getdiscount){
                    payableAmount = totalamout-fi_getdiscount;
                    statePayableAmount = payableAmount;
                    stateDiscountAmount = fi_getdiscount;
                    if(totalamout<fi_getdiscount || 0>fi_getdiscount){

                        $('#totalDiscount').addClass("danger_input");
                        $('#payableAmount').val(initial_payableamount);
                        $('#discountAmount').val(0);
                        if(payment>initial_payableamount || payment<0){
                            $('#payment').addClass("danger_input");
                        }
                        else{
                            $('#payment').removeClass("danger_input");
                        }

                    }
                    else{

                        $('#totalDiscount').removeClass("danger_input");
                        $('#payableAmount').val(payableAmount);
                        $('#discountAmount').val(fi_getdiscount);
                        if(payment>payableAmount || payment<0){
                            $('#payment').addClass("danger_input");
                        }
                        else{
                            $('#payment').removeClass("danger_input");
                        }


                    }



            }else{

                $('#payableAmount').val(initial_payableamount);
                $('#discountAmount').val(0);
                if(payment>initial_payableamount || payment<0){
                    $('#payment').addClass("danger_input");
                }
                else{
                    $('#payment').removeClass("danger_input");
                }

            }










        }
        else{
            if(fi_getdiscount){
                    if(fi_getdiscount<0 || fi_getdiscount>100){

                            $('#totalDiscount').addClass("danger_input");
                            $('#payableAmount').val(initial_payableamount);
                            $('#discountAmount').val(0);
                            if(payment>initial_payableamount || payment<0){
                                $('#payment').addClass("danger_input");
                            }
                            else{
                                $('#payment').removeClass("danger_input");
                            }


                    }
                    else{
                            $('#totalDiscount').removeClass("danger_input");
                            fi_getdiscount = (totalamout*fi_getdiscount)/100;
                            payableAmount = totalamout-fi_getdiscount;
                            statePayableAmount = payableAmount;
                            stateDiscountAmount = fi_getdiscount;
                            $('#payableAmount').val(payableAmount);
                            $('#discountAmount').val(fi_getdiscount);
                            if(payment>payableAmount || payment<0){
                                $('#payment').addClass("danger_input");
                            }
                            else{
                                $('#payment').removeClass("danger_input");
                            }

                    }



            }else{

                $('#payableAmount').val(initial_payableamount);
                $('#discountAmount').val(0);
                if(payment>initial_payableamount || payment<0){
                    $('#payment').addClass("danger_input");
                }
                else{
                    $('#payment').removeClass("danger_input");
                }

            }





        }

    });
// Input Total Discoutn Amout
















//-------------- ADD PRODUCT TO SELL TABLE WITH VALIDATION------------//






    //Initially Delete all The Table Rows
        var deletestatus =false;
        if(deletestatus == false){
        deletestatus =true;
        $.ajax({
                            url : '/admin/getTempSaleProduct',
                            type : "GET",
                            dataType : "json",
                            success:function(data)
                            {
                            $.each(data,function (key,value) {

                                    var database_product_id = value.id;
                                    $("#tempproductid_" + database_product_id).remove();
                                    // Delete
                                    $.ajax({
                                        url: 'http://localhost:8000/api/admin/getTempSaleProduct/delete/'+database_product_id,
                                        type: "delete",
                                        dataType: "json",
                                        success: function (response) {

                                        }
                                    });
                                });
                            }
                        });
                    }


    //Initially Delete all The Table Rows










    var pro_name,product_id;
    var database_qty,database_pro_selling;
    var final_total_amount = 0.0;


     $('select[name="category"]').on('change', function(){

        var cat_id = $(this).val();


        //Getting Product From Selected Category
        if (cat_id >0) {
            $.ajax({

                url : '/admin/getSaleProduct/'+cat_id,
                type : "GET",
                dataType : "json",
                success:function(data)
                {
                    $('select[name="product"]').empty();
                    $('select[name="product"]').append('<option value=" '+ 0 + ' ">' +"Select Product"+'</option>');
                    $.each(data,function (key,value) {
                        $('select[name="product"]').append('<option value=" '+ key + ' ">' +value+'</option>');
                    });
                }

            });
        }

        //Getting All Product If Category is not Selected
        else if(cat_id == 0){
            $.ajax({
            url : '/admin/getAllSaleProduct',
            type : "GET",
            dataType : "json",
            success:function(data)
            {
                $('select[name="product"]').empty();
                $.each(data,function (key,value) {
                    $('select[name="product"]').append('<option value=" '+ key + ' ">' +value+'</option>');
                });
            }

            });

        }
        else {
            $('select[name="product"]').empty();
        }
     });


        //Getting Getegory  From Selected Product
     $('select[name="product"]').on('change', function(){
        var pro_id = $(this).val();
        var getcatid;
        if (pro_id>0) {
            $.ajax({

                url : '/admin/getSaleCategory/'+pro_id,
                type : "GET",
                dataType : "json",
                success:function(data)
                {
                    // console.log(data);
                    $('select[name="category"]').empty();
                    $.each(data,function (key,value) {
                         getcatid = key;
                        var getcatname = value;
                        $('select[name="category"]').append('<option value=" '+ key + ' ">' +value+'</option>');

                    });
                }

            });

        //Getting All Category in all Time
            $.ajax({
            url : '/admin/getAllSaleCategory',
            type : "GET",
            dataType : "json",
            success:function(data)
            {
                $.each(data,function (key,value) {
                   if(key!=getcatid){
                    $('select[name="category"]').append('<option value=" '+ key + ' ">' +value+'</option>');
                   }
                });
            }

            });


        } else {
            $('select[name="category"]').empty();
            $('select[name="category"]').append('<option value=" '+ 0 + ' ">' +"Select Category"+'</option>');
             //Getting All Category in all Time
             $.ajax({
            url : '/admin/getAllSaleCategory',
            type : "GET",
            dataType : "json",
            success:function(data)
            {
                $.each(data,function (key,value) {
                    $('select[name="category"]').append('<option value=" '+ key + ' ">' +value+'</option>');

                });
            }

            });


        }
        });




        //Setting ProductDetails Value 0 When Product is not Selected
        $('select[name="category"]').on('change', function(){
        $('#pro_quantity').val("0");
        $('#pro_purchasing').val("0");
        $('#pro_selling').val("0");
        $('#pro_total').val("0");



        });

        //Setting ProductDetails Value After selecting Product
        $('select[name="product"]').on('change', function(){
        $('#pro_quantity').val("0");
        $('#pro_purchasing').val("0");
        $('#pro_total').val("0");
        $('#pro_selling').val("0");
        $('#qty').val("0");

        var pro_id = $(this).val();
        if(pro_id>0){
            $.ajax({
            url : '/admin/getAllSaleProductDetails/'+pro_id,
            type : "GET",
            dataType : "json",
            success:function(data)
            {
                pro_quantity = data[0].pro_quantity;
                pro_purchasing = data[0].pro_purchasing;
                pro_selling = data[0].pro_mrp;
                pro_name = data[0].pro_name;
                product_id = data[0].id;
                $('#pro_quantity').val(pro_quantity);
                database_qty = pro_quantity;
                database_pro_selling = pro_purchasing;
                $('#pro_purchasing').val(pro_purchasing);
                $('#pro_selling').val(pro_selling);


                //Setting Total Value by taking Qty input
                $('#qty').on( 'input',function(){
                    var qty = $('#qty').val();
                    var selprice = $('#pro_selling').val();
                    var total = qty*selprice;
                    $('#pro_total').val(total);

                });

                //Setting Total Value by taking Selling Price input
                $('#pro_selling').on( 'input',function(){
                    var qty = $('#qty').val();
                    var selprice = $('#pro_selling').val();
                    var total = qty*selprice;
                    $('#pro_total').val(total);

                });





            }

            });
        }
        });



        //Before Adding Validation
                var can_add = true;

                //Input Qty Validation
                $('#qty').on('input',function(){
                var qty = $('#qty').val();
                    if(database_qty<qty){
                        can_add = false;
                        $('#qty').addClass("danger_input");
                    }
                    else{
                        can_add = true;
                        $('#qty').removeClass("danger_input");

                    }
                });

                //Input Selling Price Validation
                $('#pro_selling').on('input',function(){
                var pro_selling = $('#pro_selling').val();
                    if(database_pro_selling>pro_selling){
                        can_add = false;
                        $('#pro_selling').addClass("danger_input");
                    }
                    else{
                        can_add = true;
                        $('#pro_selling').removeClass("danger_input");

                    }
                });




                //Adding SaleProduct By Clicking Add Button
                $('#addProduct').on('click',function(){
                    var product_id = $('select[name="product"]').val();
                    var qty = $('#qty').val();
                    var total = $('#pro_total').val();
                    var pro_pur= $('#pro_purchasing').val();
                    var pro_sell =$('#pro_selling').val();
                    var product_name = pro_name;
                    var selected_product_id =product_id;
                    var database_product_id = 0;
                    var status = 0;








                    // Checking Select Product is Available on Database or Not
                //     $.ajax({
                //                         url : '/admin/getTempSaleProduct',
                //                         type : "GET",
                //                         dataType : "json",
                //                         success:function(data)
                //                         {
                //                             $.each(data,function (key,value) {
                //                                 database_product_id = value.product_id;
                //                                 if(database_product_id == selected_product_id){
                //                                     status = 1;
                //                                 }

                //                                 });






                //                         console.log(status);



                // }});
             // Checking Complete Selected Product is Available on Database or Not





    if(product_id>0 && qty>0 && can_add==true){
        var totalDiscount = 0.0;
        var discountAmount = 0.0;
        var payableAmount = 0.0;
        totalDiscount = $('#totalDiscount').val(totalDiscount);
        discountAmount = $('#discountAmount').val(discountAmount);
        payableAmount = $('#payableAmount').val(payableAmount);
        $('#payableAmount').addClass("payablesuccess");
        $('#payment').val("0");


        // Saving Data
        $.ajax({
                    url : 'http://localhost:8000/api/admin/postProductDetails/save',
                    type : "POST",
                    data : {
                        product_id : product_id,
                        qty : qty,
                        total : total,
                        pro_pur : pro_pur,
                        pro_sell : pro_sell,
                        product_name : product_name
                    },

                    success:function(data)
                    {
                        var parsedouble = parseFloat(total);
                        final_total_amount = final_total_amount + parsedouble;
                        $('#upTotalAmount').val(final_total_amount);
                        stateTotalAmount = final_total_amount;
                        statePayableAmount = final_total_amount;
                        $('#payableAmount').val(final_total_amount);


                        var mainid = data.id;
                        var user = '<tr id="tempproductid_' +mainid + '">';
                        user += '<td>'+ product_name+'</td>';
                        user+= '<td>' +qty + '</td>';
                        user+= '<td>' +pro_pur + '</td>';
                        user+= '<td>' +pro_sell + '</td>';
                        user+='<td id="totalid_' +mainid + '" >' +total+'</td>';
                        user += '<td><a href="javascript:void(0)" id="delete_temp_product" data-id="' + mainid + '" ';
                        user += 'class="delete_temp_product ml-1"><i class="far fa-trash-alt"></i></a></td>';
                        user+='</tr>';
                        $('#showtempproduct').prepend(user);
                    }

            });
   }
// Saving Data



                });




//Delete Row from Temp table
    //delete user login
    $('#showtempproduct').on('click', '.delete_temp_product', function () {
        var temproid = $(this).data("id");
        var totalid = '#totalid_'+temproid;
        var totalidvalue = 0.0;
        var get_f_total_amount_del = 0.0;
        var totalidvalue = $(''+totalid+'').text();
        totalidvalue = parseFloat(totalidvalue);
        get_f_total_amount_del = $('#upTotalAmount').val();
        final_total_amount = get_f_total_amount_del - totalidvalue;
        statePayableAmount = final_total_amount;
        stateTotalAmount = final_total_amount;
        statePayment = 0.0;
        $('#upTotalAmount').val(final_total_amount);
        $('#payableAmount').val(final_total_amount);

        var totalDiscount = 0.0;
        var discountAmount = 0.0;
        var payableAmount = 0.0;
        totalDiscount = $('#totalDiscount').val(totalDiscount);
        discountAmount = $('#discountAmount').val(discountAmount);
        $('#payment').val("0");



        

        if(confirm("Are You sure want to delete !")) {
        $.ajax({
            type: "DELETE",
            url: 'http://localhost:8000/api/admin/deleteTempSaleProduct/delete/'+temproid,
            success: function (data) {
                $("#tempproductid_" + temproid).remove();
                var totalDiscount = 0.0;


            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    }
    });



$('#mobile').on('input', function(){
    stateCustomerMobile = $('#mobile').val();
});



var mobile = $('#mobile').val();
$('select[name="customers"]').on('change', function(){

    var customer_id = $(this).val();
    $('#mobile').val(null);


    //Getting Customer Details From Selected Customer
    if (customer_id >0) {
        $.ajax({

            url : '/admin/getcustomerdetails/'+customer_id,
            type : "GET",
            dataType : "json",
            success:function(data)
            {
                $('#mobile').val(data[1]);
                stateCustomerMobile = data[1];
                stateCustomerID = customer_id;
            }

        });
    }
    else {
        $('#mobile').val(null);
        stateCustomerID = 0;
        stateCustomerMobile = "Not Given";

    }



//-------------- COMPLETED ADD PRODUCT TO SELL TABLE WITH VALIDATION------------//


 });

 
 $('select[name="sale_type"]').on('change', function(){
    stateSaleType = $('select[name="sale_type"]').val();
    
});

 var data=false;
$("#finalSubmit").attr("disabled", false);
saleDate = $('#saleDate').val();
stateSaleType = $('select[name="sale_type"]').val();



var saveDatabase = [{}];


$('#finalSubmit').on('click', function(){
    if (saleDate!= null && stateTotalAmount>0 && statePayment>0 && statePayableAmount>0) {
        data=true;
    }
    if (data==false) {
        alert("Can Not Submit Data");
    }
    if (stateCustomerID==null || stateCustomerID==0) {
        stateCustomerID=0;
    }
    if (stateCustomerMobile==null || stateCustomerMobile=="") {
        stateCustomerMobile="Not Provided";
    }
    else {
        fullData = {date:saleDate, sale_type:stateSaleType, customer_id:stateCustomerID, customer_mobile:stateCustomerMobile, total_amount:stateTotalAmount, discount:stateDiscountAmount,payable_amount:statePayableAmount, payment:statePayment, due:stateDue };
    console.log(fullData);
    alert(fullData);

    // Saving Data
    $.ajax({
                    url : 'http://localhost:8000/api/admin/saveSaleRecords/save',
                    type : "POST",
                    data : fullData,
                    success:function(data)
                    {
                        window.location.replace("http://localhost:8000/admin/sale");
                    }

            });
    }
    
    
});        



        






    });
        </script>

        @endsection
