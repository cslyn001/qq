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
                <h1 class="m-0">Anouncements</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Anouncements</li>
                </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

  <!-- Main content -->

    <div class="container-fluid">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
                <button class="btn btn-primary btn-sm" data-toggle="modal" id="AddAnouncements">Add new Anouncements</button>
            </div>


            <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered" id="AnounTbl">
                      <thead>
                          <tr>
                            <td>ID</td>
                            <td>Title</td>
                            <td>Content</td>
                            <td>Updated by</td>
                            <td>Date created</td>
                            <td>Date updated</td>
                            <td>Action</td>

                          </tr>
                      </thead>
                      <tbody>
                          @if (isset($anoun))
                              @foreach ($anoun as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{strtoupper($item->title)}}</td>
                                    <td>{{ucwords($item->content)}}</td>
                                    <td>{{ucwords($item->updated_by)}}</td>
                                    <td>{{$item->created_at != null ? date('m/d/Y h:i A', strtotime($item->created_at)) : '-'}}</td>
                                    <td>{{$item->updated_at != null ? date('m/d/Y h:i A', strtotime($item->updated_at)) : '-'}}</td>
                                    <td>

                                        <button class="btn btn-xs btn-info btnEditAnoun" data-value="{{$item->id}}">
                                            <i class="fas fa-pen"></i>
                                        </button>

                                            <button class="btn btn-xs btn-danger btnDelAnoun" data-value="{{ $item->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>

                              @endforeach
                          @endif
                        </td>
                    </tr>
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

  <div class="modal fade" id="AnounModal" tabindex="-1">>
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add new Anouncements</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <form action="{{ url('admin/save-announcements') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="anou_id" id="anou_id">
                        <div class="row">
                            <div class="form-group row inputFormRow">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" id="title" name="title" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="">Content</label>
                                    <input type="text" id="content" name="content" class="form-control" required>
                                </div>
                            </div><div class="col-md-9">
                                <div class="form-group">
                                    <label for="">Updated By</label>
                                    <input type="text" id="updated_by" name="updated_by" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.9/dist/sweetalert2.all.min.js" integrity="sha256-2iFgzMziCroYT0IkthOS8usgi+KXxOiA5tvNCMyh984=" crossorigin="anonymous"></script>
<script>

        $(document).ready(function(){
        $("#AnounTbl").DataTable();
          });


            $('.btnDelAnoun').on('click', function(){
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
                            url: "{{ url('/admin/delete-announcements') }}",
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


            $('.btnEditAnoun').on('click', function(){
                const i = $(this).attr('data-value');
                // console.log()
                // alert($(this).attr('data-value'));
                $.ajax({
                    url: "{{ url('admin/edit-announcements') }}",
                    type: "POST",
                    data: {i:i,'_token':$('meta[name="csrf-token"]').attr('content')},
                    success: function (response)
                    {
                         console.log(response);
                        if (response) {
                            $('#title').val(response[0].title);
                            $('#content').val(response[0].content);
                            $('#updated_by').val(response[0].updated_by);


                            $('#anou_id').val(response[0].id);

                            $("#AnounModal").modal('show');
                        } else {
                            $("#AnounModal").modal('hide');
                        }
                    }

                });
            });

            $("#AddAnouncements").on('click', function(){
                $("#AnounModal").modal('show');
            });



    </script>
@endsection
