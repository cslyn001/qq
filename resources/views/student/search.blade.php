@extends('layouts.user_template')

@section('user-css')
    <link rel="stylesheet" href="{{asset('assets/css/profile.css')}}">
@endsection

@section('user-content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0">Search results</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Search results</li>
                </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Info boxes -->
      <div class="row">
        @if (count($results) > 0)
            @php
                $i = 0;
            @endphp
            @foreach ($results as $item)

                <div class="col-md-4">
                    <div class="card card-widget widget-user-2 shadow-sm mx-auto">
                        <div class="widget-user-header">
                            <div class="widget-user-image">
                                <!--<img src="/documents/{{$item->prof_pic}}" alt="User Avatar" class="img-circle elevation-2" style="width: 10%;height:auto;">-->
                                @if ($prof_pic !== NULL)
                                <img src="/documents/{{$item->prof_pic}}" alt="User Avatar" class="img-circle elevation-2" style="width: 10%;height:auto;">
                                @else
                                <div class="pro-img"><img src="{{asset('assets/images/dp.png')}}" alt="user"></div>
                                @endif
                            </div>
                            <a href="{{ url('/student/profile-view/'.$item->id)}}"> &nbsp; &nbsp; &nbsp; {{$item->fname}} {{isset($item->mname) ? $item->mname : '.'}}. {{isset($item->lname) ? $item->lname : ''}}  {{isset($item->sname) ? $item->sname : ''}}</a>
                        </div>
                    </div>
                </div>


            @php
                $i++;
            @endphp

            @if ($i % 3 == 0)
                </div>
                <div class="row">
            @endif
            @endforeach
        @endif

        @if (count($results) == 0)
            <div class="col-md-12">
                No results found.
            </div>
        @endif
      </div>
      <!-- /.row -->
    </div><!--/. container-fluid -->
  </section>
@endsection
