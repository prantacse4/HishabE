@extends('admin.layouts.productlayout')

@section('pagename')
    Product
@endsection

@section('extracsscdn')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('productsidebar')
@include('admin.sidebar.productsidebar')
@endsection


@section('admincontent')





        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Product</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.product') }}">Product</a></li>
                                <li class="breadcrumb-item active">Add Product</li>
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
                <section class="content">
                    <div class="row">
                        <div class="col-12">

                            <!-- /.card -->



                                <div class="container-fluid">
                                    <!-- main body start from here -->

                                    <!-- Horizontal Form -->
                                        <div class="card card-info ">
                                        <div class="card-header">
                                            <h3 class="card-title">Product Information</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <!-- form start -->
                                        <form  class="form-horizontal" action="{{ route('admin.addproduct.store') }}" method="POST">
                                            @csrf
                                            <div class="card-body">
                                                <x-alert></x-alert>


                                            <div class="form-group row">
                                                <label  class="col-sm-2 col-form-label">Product Name</label>
                                                <div class="col-sm-6">
                                                <input  type="text" name="pro_name" class="form-control" placeholder="Enter Product Name" required="">
                                                </div>
                                            </div>



                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Product Code</label>
                                                <div class="col-sm-6">
                                                <input type="text" name="pro_code" class="form-control" placeholder="Product code" required>
                                                </div>
                                            </div>



                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Category</label>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <select class="form-control select2 select2-info" name="cat_id" data-dropdown-css-class="select2-info" style="width: 100%;">
                                                            <option value="" selected>Select Category</option>

                                                            @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                                                            @endforeach


                                                        </select>
                                                    </div>


                                                </div>
                                            </div>




                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Company Name</label>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <select class="form-control select2 select2-info"
                                                        data-dropdown-css-class="select2-info" style="width: 100%;" name="com_id">
                                                        <option value="" selected>Select Company</option>
                                                        @foreach ($companies as $company)
                                                        <option value="{{ $company->id }}">{{ $company->com_name }}</option>
                                                        @endforeach
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>




                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Quantity Type</label>

                                                <div class="col-sm-6">


                                                    <div class="form-group">
                                                        <select class="form-control select2 select2-info" name="qty_type" data-dropdown-css-class="select2-info" style="width: 100%;">
                                                            <option selected="selected">Kg</option>
                                                            <option>Piece</option>
                                                        </select>
                                                    </div>



                                                </div>
                                            </div>





                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Quantity</label>
                                                <div class="col-sm-6">
                                                <input  type="number" name="pro_quantity" class="form-control" placeholder="Quantity" required="">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Purchasing Price</label>
                                                <div class="col-sm-6">
                                                <input type="text" name="pro_purchasing" class="form-control" placeholder="Purchasing price" required="">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">MRP Price</label>
                                                <div class="col-sm-6">
                                                <input type="text" name="pro_mrp" class="form-control" placeholder="MRP price" required="">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Wholesale Price</label>
                                                <div class="col-sm-6">
                                                <input type="text" name="pro_wholesale" class="form-control" placeholder="Wholesale price" required="">
                                                </div>
                                            </div>





                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Description</label>
                                                <div class="col-sm-6">
                                                    <textarea name="pro_description"  class="form-control"   rows="6" placeholder="Description about product" required></textarea>
                                                </div>
                                            </div>




                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label"></label>
                                                <div class="col-sm-4">
                                                <button type="submit" name="submit2" class="btn btn-success btn-2">Submit</button>
                                                <button type="reset" class="btn btn-danger btn-2">Reset</button>
                                                <a class="btn btn-info " href="{{ route('admin.product') }}">Go Back</a>
                                                </div>
                                            </div>
                                            </div>
                                            <!-- /.card-body -->
                                        </form>
                                        </div>
                                        <!-- /.card -->


                                </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
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

@endsection




