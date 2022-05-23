@extends('layouts.admin_template')

@section('admin-css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('admin-content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0">Admin Report</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Admin Report</li>
                </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


                  <div class="col-x1-3 col-md-4">
                <div class="card bg-primary text-white mb-4">
                  <div class="card-body">
                        Total E-Portfolio Registered
                        <h2>{{$user}}</h2>
                </div>
                </div>
            </div>

            <div class="col-x1-3 col-md-4">
                <div class="card bg-primary text-white mb-4">
                  <div class="card-body">
                      Total Student Access
                        <h2>{{$student}}</h2>
                </div>
                </div>
            </div>

    
   

    @endsection
