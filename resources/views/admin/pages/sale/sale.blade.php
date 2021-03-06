@extends('admin.layouts.salelayout')

@section('pagename')
    Sale
@endsection


@section('extracsscdn')
@include('admin.layouts.datatablescdncss')
@endsection



@section('salesidebar')
@include('admin.sidebar.salesidebar')
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
                                <li class="breadcrumb-item active">Sale</li>
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

                            <div class="card">
                                <div class="card-header bg-secondary">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="ptitle">
                                            <h3>Sale</h3>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <a href="{{ route('admin.saleproduct') }}" class="btn btn-success text-right addbtn">
                                                <i class="fas fa-plus"></i>
                                                <span> Sale Product</span>
                                            </a>
                                        </div>
                                </div>

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    @if(session()->has('message'))
                                    <div class="alert alert-success">{{session()->get('message')}}</div>
                                    @endif
                                    <table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Sale ID</th>
                                                <th>Customer Phone</th>
                                                <th>Sale Type</th>
                                                <th>Total</th>
                                                <th>Discount</th>
                                                <th>Payment</th>
                                                <th>Due</th>
                                                <td>Actions</td>
                                            </tr>
                                        </thead>



                                        <tbody>
                                        @foreach ($records as $record)

                                            <tr>
                                                <td>{{$record->id}}</td>
                                                <td>{{$record->customer_mobile}}</td>
                                                <td>{{$record->sale_type}}</td>
                                                <td>{{$record->total_amount}}</td>
                                                <td>{{$record->discount}}</td>
                                                <td>{{$record->payment}}</td>
                                                <td>{{$record->due}}</td>
                                                <td>
                                                    <button class="btn btn-info acbtn2">
                                                        <i class="far fa-eye"></i>
                                                    </button>
                                                    <a href="#" class="btn btn-secondary acbtn2">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <button  class="btn btn-danger acbtn2"
                                                    onclick="event.preventDefault();document.getElementById('form-delete-id-{{ $record->id }}').submit();">
                                                        <i class="fa fa-trash-alt"></i>
                                                    </button>
                                                    <form id="{{ 'form-delete-id-'.$record->id }}" action="{{route('admin.deletecompany',$record->id)}}" method="POST" style="display: none;">
                                                        @csrf
                                                        @method('delete')
                                                        </form>
                                                </td>
                                            </tr>
                                        @endforeach


                                        </tbody>







                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </section>
                <!-- /.content -->
        </div>



        @endsection



        @section('extrajscdn')
        @include('admin.layouts.datatablescdn')
        @endsection

