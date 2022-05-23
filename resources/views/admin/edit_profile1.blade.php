@extends('layouts.admin_template')

@section('admin-css')
    <link rel="stylesheet" href="{{asset('assets/css/profile.css')}}">
    <link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}" rel="stylesheet" />
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
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Edit Profile</li>
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
        <div class="col-md-12">
            <div class="card">
                <form action="{{ url('admin/save-profile') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (isset($profile))
                        @foreach ($profile as $val => $row)
                        @endforeach
                    @endif
                        <div class="card-body">

                            <div class="col-md-12">
                                <input type="hidden" name="p_id" id="p_id" value="{{ isset($row) ? $row->id : '' }}">
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Profile Picture</label>
                                    <div class="col-lg-9 col-xl-6">

                                        <div class="image-input image-input-empty image-input-outline" id="prof_pic">
                                            @if (isset($row) &&$row->prof_pic !== NULL)
                                                <div class="image-input-wrapper" style="background-image: url(/storage/prof_pics/{{$row->prof_pic}})"></div>
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
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Barangay</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="brgy" name="brgy" placeholder="Barangay" value="{{ isset($row) ? $row->brgy : '' }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Region</label>
                                    <div class="col-sm-10">
                                        <select name="region" id="region" class="form-control select2 required" style="width: 100%;">
                                            <option selected disabled>[ Select Region ]</option>

                                            @foreach ($regions as $region)

                                                <option value="{{ $region->region_id }}" {{ isset($row) && $row->region == $region->region_id ? 'selected' : '' }}>{{ $region->name }}</option>
                                            @endforeach
                                        </select>
                                        {{-- @dump($region->name) --}}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Province</label>
                                    <div class="col-sm-10">
                                        <select name="province" id="province" class="form-control select2 required" style="width: 100%;">
                                            <option selected disabled>[ Select Province ]</option>
                                            @foreach ($provinces as $province)

                                                <option value="{{  $province->province_id}}" {{ isset($row) && $row->province == $province->province_id ? 'selected' : '' }}>{{ $province->name }}</option>
                                            @endforeach
                                        </select>
                                        {{-- @dump($region->name) --}}
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">City</label>
                                    <div class="col-sm-10">
                                        <select name="city" id="city" class="form-control select2 required" style="width: 100%;">
                                            <option selected disabled>[ Select City ]</option>
                                            @foreach ($cities as $city)

                                                <option value="{{  $city->city_id}}" {{ isset($row) && $row->city == $city->city_id ? 'selected' : '' }}>{{ $city->name }}</option>
                                            @endforeach
                                        </select>
                                        {{-- @dump($region->name) --}}
                                    </div>
                                </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <label>Gender</label>

                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-check">
                                                        {{-- <input type="radio" name="sex"  value="male" required  {{$row->sex == 'male' ? 'male' : '' }}> --}}
                                                        <input type="radio" value="male" name="sex" required {{ isset($row) && $row->sex == 'male' ? 'checked' : 'male' }}/> male

                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-check">
                                                        {{-- <input type="radio" name="sex" value="female" required {{ $row->sex == 'female' ? '' : 'female' }}> --}}
                                                        <input type="radio" value="female" name="sex" required {{ isset($row) && $row->sex == 'female' ? 'checked' : 'female' }}/> female
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>Birth Date</label>
                                            <input type="date" class="form-control" id="birthday" name="birthday" value="{{ isset($row) ? $row->birthday : '' }}">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>Contact Number</label>
                                            <input type="text" class="form-control" id="contact_number" name="contact_num" value="{{ isset($row) ? $row->contact_num : '' }}">
                                        </div>
                                    </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control" id="email" name="email" value="{{ isset($row) ? $row->email : '' }}">
                                            </div>
                                      </div>
                                 </div>
                            </div>
                        </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
      </div>
      <!-- /.row -->
    </div><!--/. container-fluid -->
  </section>
@endsection

@section('user-js')
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
