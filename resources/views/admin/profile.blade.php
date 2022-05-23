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
                <h1 class="m-0">Edit Profile</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Edit Profile</li>
                </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
          <!-- Info boxes -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <form action="{{ url('admin/save-profile') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (isset($profile))
                    @foreach ($profile as $row)
                <div class="card-header">

                    <div class="card-body">
                        <input type="hidden" name="x_id" id="x_id" value="{{ isset($row) ? $row->id : '' }}">
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Profile Picture</label>
                            <div class="col-lg-9 col-xl-6">


                                <div class="image-input image-input-empty image-input-outline" id="prof_pic">
                                    @if ($row->prof_pic !== NULL)
                                        <div class="image-input-wrapper" style="background-image: url(/storage/documents/{{$row->prof_pic}})"></div>
                                    @else
                                        <div class="image-input-wrapper" style="background-image: url({{asset('assets/images/dummy.jpg')}})"></div>
                                    @endif
                                    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                     <i class="fa fa-pen icon-sm text-muted"></i>
                                     <input type="file" name="prof_pic" accept=".png, .jpg, .jpeg"/>
                                     <input type="hidden" name="prof_pic_remove"/>
                                    </label>

                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                     <i class="ki ki-bold-close icon-xs text-muted"></i>
                                    </span>

                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
                                     <i class="ki ki-bold-close icon-xs text-muted"></i>
                                    </span>
                                </div>
                                <span class="form-text"><strong>NOTE:</strong> Allowed file types: png, jpg, jpeg. Please upload 1x1 or 2x2 picture.</span>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-2 col-form-label">First name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fname" name="fname" placeholder="First name" value="{{ isset($row) ? $row->fname : '' }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mname" class="col-sm-2 col-form-label">Middle name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="mname" name="mname" placeholder="Middle name" value="{{ isset($row) ? $row->mname : '' }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Last name & Suffix</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="lname" name="lname" placeholder="Last name" value="{{ isset($row) ? $row->lname : '' }}">
                            </div>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="sname" name="sname" placeholder="Suffix" value="{{ isset($row) ? $row->sname : '' }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="{{ isset($row) ? $row->address : '' }}">
                            </div>
                        </div>
                        
                        
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-3">
                                    <label>Gender</label>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-check">
                                                {{-- <input type="radio" name="sex"  value="male" required  {{$row->sex == 'male' ? 'male' : '' }}> --}}
                                                {{-- <input type="radio" value="male" name="sex" required /> male --}}
                                                <input type="radio" value="male" name="sex" required {{ $row->sex == 'male' ? 'checked' : 'male' }}/> male


                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-check">
                                                {{-- <input type="radio" name="sex" value="female" required {{ $row->sex == 'female' ? '' : 'female' }}> --}}
                                                {{-- <input type="radio" value="female" name="sex" required /> female --}}
                                                <input type="radio" value="female" name="sex" required {{ $row->sex == 'female' ? 'checked' : 'female' }}/> female
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-group">
                                        <label>Birth date</label>
                                        <input type="date" class="form-control" id="birthday" name="birthday" placeholder="Birthday" value="{{ isset($row) ? $row->birthday : '' }}">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>Contact Number</label>
                                        <input type="text" class="form-control" id="contact_num" name="contact_num" placeholder="Contact Number" value="{{ isset($row) ? $row->contact_num : '' }}">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ isset($email) ? $email : '' }}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        <div class="card-footer">
                            <center>  <button type="submit" class="btn btn-info">Save changes</button> </center>
                          </div>
                    </div>
                </form>

                    </div>





                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div><!--/. container-fluid -->
    </section>

@endsection
@section('admin-js')
    <script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('.select2').select2({
                theme: 'bootstrap4'
            });

            $("#region").on('change', function () {
                $('#province').children('option:not(:first)').remove();
                $.ajax({
                    url: "{{ url('/get-provinces') }}",
                    type: "POST",
                    data: { 'region_id': $(this).val(), '_token': $('meta[name="csrf-token"]').attr('content') },
                    success: function (items) {
                        $.each(items, function (i, item) {
                            $('#province').append($('<option>', {
                                value: item.province_id,
                                text: item.name
                            }));
                        });
                    }
                });
            });

            $("#province").on('change', function () {
                $('#city').children('option:not(:first)').remove();
                $.ajax({
                    url: "{{ url('/get-cities') }}",
                    type: "POST",
                    data: { 'province_id': $(this).val(), '_token': $('meta[name="csrf-token"]').attr('content') },
                    success: function (items) {
                        $.each(items, function (i, item) {
                            $('#city').append($('<option>', {
                                value: item.city_id,
                                text: item.name
                            }));
                        });
                    }
                });
            });

            $('#profile-image1').on('click', function() {
                $('#profile-image-upload').click();
            });
        });

        function previewFile() {
            var preview = document.querySelector('img');
            var file    = document.querySelector('input[type=file]').files[0];
            var reader  = new FileReader();

            reader.addEventListener("load", function () {
                preview.src = reader.result;
            }, false);

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
