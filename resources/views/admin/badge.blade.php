@extends('layouts.admin_template')

@section('admin-content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0">Badge</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Badge</li>
                </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
          <!-- Info boxes -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="table-responsive">
                      <table class="table table-bordered" id="userTbl">
                          <thead>
                              <tr>
                                  <td>Student ID</td>
                                  <td>Name</td>
                                  <td>Certificate Picture</td>
                                  <td>Number of Certificate </td>
                                  <td>Action</td>
                              </tr>
                          </thead>
                          <tbody>
                            @if (isset($users))

                                @foreach ($users as $item)
                                <tr>
                                    <td>{{$item->student_id_number ? $item->student_id_number : '-'}}</td>
                                    <td>
                                        {{strtoupper($item->fname)}} {{isset($item->mname) ? strtoupper($item->mname) : ''}} {{isset($item->lname) ? strtoupper($item->lname) : ''}}  {{isset($item->sname) ? strtoupper($item->sname) : ''}}
                                    </td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->created_at != null ? date('m/d/Y h:i A', strtotime($item->created_at)) : '-'}}</td>
                                    <td>{{$item->updated_at != null ? date('m/d/Y h:i A', strtotime($item->updated_at)) : '-'}}</td>
                                    <td>




                                        <button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#change">
                                            <i class="fas fa-key"></i>
                                        </button>



                                            <button class="btn btn-xs btn-danger btnDelUser"  data-value="{{ $item->id }}">
                                            <i class="fas fa-trash"></i>
                                           </button>


                                            <div class="container-fluid">
                                              <!-- Info boxes -->

                                             <div class="modal fade" id="change">
                                                  <div class="modal-dialog modal-lg modal-dialog-centered">
                                                     <div class="modal-content">
                                                        <div class="modal-header">
                                                                <h4 class="modal-title">Change Password</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                         <form action="{{ url('admin/reset-passwords') }}" method="POST">
                                                              @csrf
                                                                @if (isset($reset))
                                                                 @foreach ($reset as $row)
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
                                                                                <span style="font-size:13px;"><strong>Password Requirements:</strong></span>
                                                                                <div style="padding-left: 10px;">
                                                                                    <ul style="list-style-type: square;font-size:13px;">
                                                                                        <li>Atleast 8 or more characters</li>
                                                                                        <li>Mixture of uppercase and lowercase letters, numeric characters and inclusion of at least one special character, e.g. !@*?#$&</li>
                                                                                        <li>[No spaces allowed]</li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                      </div>
                                                                      <div class="modal-footer">
                                                                          <button type="submit" class="btn btn-primary">Save changes</button>

                                                                    </td>
                                                                    </tr>
                                                                    @endforeach
                                                                @endif
                                                            </tbody>
                                                        </table>
                                                    </div>
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
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.9/dist/sweetalert2.all.min.js" integrity="sha256-2iFgzMziCroYT0IkthOS8usgi+KXxOiA5tvNCMyh984=" crossorigin="anonymous"></script>

<script>


    $(document).ready(function(){
        $("#userTbl").DataTable();
    });

    $('.btnDelUser').on('click', function(){
                // alert($(this).attr('data-value'));
                var i = $(this).attr('data-value');
                Swal.fire({
                    title: 'Are you sure to delete this?',
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it.',
                    denyButtonText: `Don't Delete`,
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ url('/admin/delete-userlist') }}",
                            type: "POST",
                            data: {i:i,'_token':$('meta[name="csrf-token"]').attr('content')},
                            success: function (response)
                            {
                                console.log(response);
                                if(response) {
                                    Swal.fire({
                                        title: 'Deleted!',
                                        icon: 'success',
                                        showDenyButton: false,
                                        showCancelButton: false,
                                        confirmButtonText: 'Ok',
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            /* if na click ung okay */
                                            window.location.reload();
                                        }
                                    })
                                } else {
                                    Swal.fire('Sorry may error!', '', 'error')
                                }
                            }
                        });
                    } else if (result.isDenied) {
                        Swal.fire('Changes are not saved', '', 'info')
                    }
                })
            });

    //          $(document).ready(function(){
    // $(".toggle-password").click(function () {
    //     $(".showPwd").toggleClass("fa-eye fa-eye-slash");
    //     var input = $(this).parent().parent().find("input");

    //     if (input.attr("type") == "password") {
    //         input.attr("type", "text");
    //     } else {
    //         input.attr("type", "password");
    //     }
    // });

    // $('.pwd').on("cut copy paste", function (e) {
    //     e.preventDefault();
    // });



</script>
@endsection
