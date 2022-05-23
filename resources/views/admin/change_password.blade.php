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
                <h1 class="m-0">Change Password </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Change Password</li>
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
      <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card-body login-card-body">
                <form action="{{ url('admin/change-password') }}" method="POST">
                    @csrf
                    @if (isset($pass))
                    @foreach ($pass as $row)
                    @endforeach
                    @endif
                    <div class="card-body">

                      <div class="modal-body">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Create your new password</label>
                                    <div class="input-group">
                                        <input type="password" name="user_password" id="user_password" minlength="8" class="form-control pwd" placeholder="New password" required>
                                        <div class="input-group-append">
                                            <button class="btn btn-secondary toggle-password" type="button"><i class="fas fa-eye" id="showPwd"></i></button>
                                        </div>
                                    </div>
                                    <br>
                                    <span style="font-size:13px;"><strong>CHARACTERISTICS OF STRONG PASSWORDS:</strong></span>
                                    <div style="padding-left: 5px;">
                                        <ul style="list-style-type: square;font-size:10px;">
                                            <li>At least 8 characters or more characters</li>
                                            <li>A mixture of both uppercase and lowercase letters.</li>
                                            <li>A mixture of letters and numbers</li>
                                            <li>Inclusion of at least one special character, e.g., ! @ # ?</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save changes</button>

                          </div>
                      </form>
                    </div>
                  </div>
                </div>


      <!-- /.row -->
    <!--/. container-fluid -->
  </section>
@endsection

@section('admin-js')
    <script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>

    <script>

        $(document).ready(function(){
            $(".toggle-password").click(function () {
                $(".showPwd").toggleClass("fa-eye fa-eye-slash");
                var input = $(this).parent().parent().find("input");

                if (input.attr("type") == "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });

            $('.pwd').on("cut copy paste", function (e) {
                e.preventDefault();
            });
        });

    </script>
@endsection
