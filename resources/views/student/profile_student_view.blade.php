@extends('layouts.user_template')

@section('user-css')
    <link rel="stylesheet" href="{{asset('assets/css/profile.css')}}">
    <link href="https://unpkg.com/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet">

@section('user-content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-12">
            <div class="card"> <img class="card-img-top" src="{{asset('assets/images/pro-timeline.jpg')}}" alt="Card image cap">
                <div class="card-body little-profile text-center">
                    <!--<div class="pro-img"><img src="/documents/{{$user_profpic}}" alt="user"></div>-->
                    @if ($prof_pic !== NULL)
                        <div class="pro-img"><img src="/documents/{{$user_profpic}}" alt="user"></div>
                    @else
                        <div class="pro-img"><img src="{{asset('assets/images/dp.png')}}" alt="user"></div>
                    @endif
                    <h2 class="m-b-0">{{$userfname}} {{$userlname}}</h2>
                    <!--<b>BSIT 4-1<b>-->
                        <div class="row text-center m-t-20">
                            <div class="col-lg-12 col-md-12 m-t-20">
                                <div class="obj"><h6><b>Objective:</b> {{$objective}}<h6></div>
                                <h3 class="m-b-0 font-light"></h3>
                                <div class="div"><h5><b>Badge Collection</b></h5></div>
                                <div class="badge">
                                       @if(count($awardsachievement) <= 1 )
                                        <!--We need 2 Achievement to attain a Badge-->
                                    @elseif(count($awardsachievement) <=2 )
                                    <img class="card-img-top" src="{{asset('assets/images/awards1.png')}}" alt="Card image cap" style="height: 100px; width:100px;">
                                    @elseif(count($awardsachievement) <=3 )
                                    <img class="card-img-top" src="{{asset('assets/images/awards2.png')}}" alt="Card image cap" style="height: 100px; width:100px;">
                                    @elseif(count($awardsachievement) >=4 )
                                    <img class="card-img-top" src="{{asset('assets/images/awards3.png')}}" alt="Card image cap" style="height: 100px; width:100px;">
                                     @endif
                                         <style>
                                             .badge {
                                                 top: 1px;

                                             }
                                        </style>
                                </div>
                                {{-- education badge --}}

                                <div class="badge">
                                    @if(count($certification) <= 1 )
                                    <!--We need 2 Certificate to attain a Badge-->
                                @elseif(count($certification) <=2 )
                                <img class="card-img-top" src="{{asset('assets/images/cert1.png')}}" alt="Card image cap" style="height: 100px; width:100px;">
                                @elseif(count($certification) <= 3)
                                <img class="card-img-top" src="{{asset('assets/images/cert2.png')}}" alt="Card image cap" style="height: 100px; width:100px;">
                                @elseif(count($certification) >= 4)
                                <img class="card-img-top" src="{{asset('assets/images/cert3.png')}}" alt="Card image cap" style="height: 100px; width:100px;">
                                 @endif
                                     <style>
                                         .badge1 {
                                             top: 1px;
                                             right: 10px;
                                         }
                                    </style>
                            </div>
                            {{-- experience --}}
                            <div class="badge">
                                @if(count($seminar) <= 1 )
                                <!--We need 2 Seminar to attain a Badge-->
                            @elseif(count($seminar) <=2 )
                            <img class="card-img-top" src="{{asset('assets/images/seminar1.png')}}" alt="Card image cap" style="height: 100px; width:100px;">
                            @elseif(count($seminar) <= 3)
                            <img class="card-img-top" src="{{asset('assets/images/seminar2.png')}}" alt="Card image cap" style="height: 100px; width:100px;">
                            @elseif(count($seminar) >= 4)
                            <img class="card-img-top" src="{{asset('assets/images/seminar3.png')}}" alt="Card image cap" style="height: 100px; width:100px;">
                             @endif
                                 <style>
                                     .badge1 {
                                         top: 1px;
                                         right: 10px;
                                     }
                                </style>
                        </div>
                            </div>

                </div>
            </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

        <div class="row">
            <div class="col-md-12">
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title"><strong>EDUCATION</strong></h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                        @if (isset($educations))
                            @foreach ($educations as $row)
                                @if ($row->privacy_type == 1)
                                    <div class="callout callout-success">
                                        <h5> Institution Name: &nbsp;<b> {{$row->institution_name}}</b></h5>

                                        @if ($row->educ_level == "College")
                                            <p>Intitution Address : &nbsp;<b>{{$row->institution_address}}</b> <br> Education Level: &nbsp;<b>{{$row->educ_level}} </b> <br> Degree: &nbsp;<b>{{$row->degree}}</b> <br> From: &nbsp;<b>{{$row->from}}</b> <br> To:&nbsp; <b>{{$row->to}}</b> </p>
                                        @else
                                            <p>Intitution Address : &nbsp;<b>{{$row->institution_address}} </b> <br>  Education Level: &nbsp;<b>{{$row->educ_level}}</b> <br> Degree: &nbsp;<b>{{$row->degree}}</b> <br> From: &nbsp;<b>{{$row->from}}</b> <br> To: &nbsp;<b>{{$row->to}}</b> </p>
                                        @endif

                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                  </div>
                  <!-- /.row -->
                </div>
                <!-- ./card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->

            <div class="col-md-12">
                <div class="card card-success">
                  <div class="card-header">
                    <h3 class="card-title"><strong>EXPERIENCE</strong></h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                          @if (isset($experiences))
                              @foreach ($experiences as $row)
                                <div class="callout callout-success">
                                    <h5>Job Title : <b>{{$row->job_title}} </b></h5>

                                    <p>Company Name: &nbsp;<b>{{$row->company}}</b> <br> Company address : &nbsp;<b>{{$row->job_address}}</b> <br>  Start Date: &nbsp;<b>{{ date('M d, Y', strtotime($row->start_date)) }}</b> <br> End Date: &nbsp;<b>{{date('M d, Y', strtotime($row->end_date)) }}</b> </p>
                                </div>
                              @endforeach
                          @endif
                      </div>
                    </div>
                    <!-- /.row -->
                  </div>
                  <!-- ./card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->

            <div class="col-md-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title"><strong>SKILLS</strong></h3>

                        <div class="card-tools">
                        @if (!isset($skills[0]))
                        @endif
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                @if (isset($skills[0]))
                                    <div class="callout callout-success">
                                        <p>{{ isset($skills[0]) ? str_replace(',', ', ', $skills[0]->skills) : '' }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- ./card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->

            <div class="col-md-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title"><strong>AWARDS & ACHIEVEMENTS</strong></h3>

                        <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        </div>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                @if (isset($awardsachievement))
                                 @foreach ($awardsachievement as $row)


                                    <div class="callout callout-success">
                                        <h5> Title: &nbsp;<b>{{$row->title}} </b></h5>

                                        <p> Description :&nbsp; <b>{{$row->description}}</b> <br>
                                            Issuer:&nbsp; <b>{{$row->issuer}}</b> <br>
                                            Venue: &nbsp;<b>{{$row->venue}}</b> <br>
                                            Type: &nbsp;<b>{{$row->type}}</b> <br>
                                            Date Given: &nbsp;<b> {{ date('M d, Y', strtotime($row->date_given))}} </b><br>
                                            <!--attachment_filename: &nbsp;<b>    {{$row->attachment_filename}}   <br>-->
                                            </b> </p>
                                            {{-- <button type="button">@if ($row->privacy_status == 2) Public @elseif($row->privacy_status == 1) Private @endif</button> --}}
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- ./card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->

            <div class="col-md-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title"><strong>CERTIFICATIONS</strong></h3>

                        <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                            @if (isset($certification))
                                @foreach ($certification as $row)
                                <div class="callout callout-success">
                                    <h5> Certification Name: &nbsp;<b>{{$row->cert_name}} </b></h5>

                                    <p> Issuer: &nbsp; <b>{{$row->cert_author}}</b> <br> Certification Address : &nbsp;<b>{{$row->cert_address}} </b> <br> Date Given: <b> {{ date('Y-m-d', strtotime($row->date_give))}} </b> <br> Expiration: &nbsp; <b>{{$row->expiration}}</b> </p>
                                </div>
                                @endforeach
                            @endif
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- ./card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->

            <div class="col-md-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title"><strong>PROJECTS</strong></h3>

                        <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                @if (isset($project))
                                    @foreach ($project as $row)
                                    <div class="callout callout-success">
                                        <h5> Title: &nbsp;<b>{{$row->project_title}}</b></h5>

                                        <p> Position: &nbsp; <b>{{$row->position}}</b> <br>  Description: &nbsp; <b>{{$row->project_description}}</b><br>Date_established: &nbsp; <b>{{ date('M d, Y ', strtotime($row->date_established))}}</b> <br> Url: &nbsp; <b>{{$row->url}}</b> <br> 
                                        <!--File Upload: &nbsp; <b>{{$row->file_upload}}</b>-->
                                        </p>
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>         
                    <!-- ./card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            
            <div class="col-md-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title"><strong>ORGANIZATIONS AFFILIATION </strong></h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>

              <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                              
                                @if (isset($organization))
                                    @foreach ($organization as $row)
                                    <div class="callout callout-success">
                                     <h5>Organization Name : &nbsp; <b>{{$row->org_name}} </b></h5>
                                       <p>Associated With : &nbsp; <b>{{$row->org_associated_with}} </b>
                                       <br>   Position : &nbsp; <b>{{$row->position}} </b>
                                        <br>  Start Date: &nbsp; <b>{{ date('M d, Y', strtotime($row->start_date)) }}</b>
                                         <br> End Date: <b>{{date('M d, Y', strtotime($row->end_date)) }}</b> </p>
                                       
                                    </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- ./card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->

            <div class="col-md-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title"><strong>SEMINARS, TRAINING AND WORKSHOP ATTENDED </strong></h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                @if (isset($seminar))
                                @foreach ($seminar as $row)
                                  <div class="callout callout-success">
                                      <h5> Title: &nbsp;<b>{{$row->title}}</b></h5>

                                      <p> Venue: &nbsp; <b>{{$row->venue}}</b><br>  Type: &nbsp; <b>{{$row->venue}}</b> <br> Date Given: &nbsp; <b>{{ date('M d, Y ', strtotime($row->date_given))}}</b> <br> 
                                      <!--Attachment Filename: &nbsp; <b>{{$row->attachment_filename}}</b> -->
                                      </p>
                                  </div>
                                @endforeach
                            @endif
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- ./card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!--/. container-fluid -->
  </section>

  <div class="modal" id="educBackgroundModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Educational Background</h5>
        </div>
        <form action="{{ url('student/save-educ') }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="col-md-12">
                    <input type="hidden" name="eid" id="eid">
                    <div class="form-group">
                        <label for="">Educational Level</label>
                        <select class="form-control" name="level" id="level">
                            <option value="" selected disabled>Select</option>
                            <option value="Elementary">Elementary</option>
                            <option value="High School">High School</option>
                            <option value="Senior High">Senior High</option>
                            <option value="College">College</option>
                            <option value="Vocational">Vocational</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Institution Name</label>
                        <input type="text" class="form-control" name="institution_name" id="institution_name">
                    </div>
                    <div class="form-group">
                        <label for="">Institution address</label>
                        <textarea class="form-control" name="institution_addr" id="institution_addr" style="resize:none;"></textarea>
                    </div>

                    <div class="form-group" id="strandtrack" hidden>
                        <label for="">Strand/Track</label>
                        <input type="text" class="form-control" name="strandtrack" id="strandtrack">
                    </div>

                    <div class="form-group" id="course" hidden>
                        <label for="">Course</label>
                        <input type="text" class="form-control" name="course" id="course">
                    </div>

                    <div class="form-group" id="course">
                        <label for="">From</label>
                        <input type="date" class="form-control" name="from" id="from">
                    </div>
                    <div class="form-group">
                        <label for="">To</label>
                        <input type="date" name="to" id="to" class="form-control">
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
      </div>
    </div>
  </div>

  {{-- modal --}}
  <div class="modal" id="experienceModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Experience</h5>
        </div>
        <form action="{{ url('student/save-experience') }}" method="POST">
            @csrf
            <div class="modal-body">
                <input type="hidden" name="ex_id" id="ex_id">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Company Name</label>
                        <input type="text" class="form-control" name="company_name" id="company_name">
                    </div>
                    <div class="form-group">
                        <label for="">Job Title</label>
                        <input type="text" class="form-control" name="job_title" id="job_title">
                    </div>
                    <div class="form-group">
                        <label for="">Company address</label>
                        <textarea class="form-control" name="company_addr" id="company_addr"></textarea>
                    </div>
                    <div class="form-group" id="course">
                        <label for="">Start Date</label>
                        <input type="date" class="form-control" name="start_date_experience" id="start_date">
                    </div>
                    <div class="form-group">
                        <label for="">End Date</label>
                        <input type="date" name="end_date_experience" id="end_date" class="form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
      </div>
    </div>
  </div>

  {{-- modal --}}
  <div class="modal" id="addAwardsAchievementsModal" tabindex="-1">
    <div class="modal-dialog">
       <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Awards & Achievements</h5>
        </div>
        <form action="{{ url('student/save-awardsachievement') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
              <input type="hidden" name="aid" id="aid">
              <div class="col-md-12">
                  <div class="form-group">
                      <label for="">Title</label>
                      <input type="text" class="form-control" name="title" id="title">
                  </div>
                  <div class="form-group">
                      <label for="">Description</label>
                      <input type="text" class="form-control" name="description" id="description">
                  </div>
                  <div class="form-group">
                      <label for="">Issuer</label>
                      <input type="text" class="form-control" name="issuer" id="issuer">
                  </div>
                  <div class="form-group">
                    <label for="">Venue</label>
                    <input type="text" class="form-control" name="venue" id="venue">
                  </div>
                  <div class="form-group">
                    <label for="">Type</label><br>
                    <select  class="form-control" type="type" name="type" id="type">
                        <option value="">Select</option>
                        <option value="provincial">Provincial</option>
                        <option value="regional">Regional</option>
                        <option value="local">Local</option>
                        <option value="internationl">International</option>
                      </select>
                </div>
                  <div class="form-group">
                    <label for="">Date Given</label>
                    <input type="date" id="from_date" class="form-control" name="from_date" value="2022-01-18" placeholder="Enter Start Date">
                  </div>
                  <div class="form-group">
                    <label for="">Attachment Filename</label>
                    <input type="file" class="form-control" name="attachment_filename" id="attachment_filename">
                  </div>
              </div>
          </div>

          <div class="modal-footer">
             <button type="button" class="btn btn-danger" id="" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>

          </div>
        </form>
      </div>
    </div>
  </div>

{{-- modal --}}
  <div class="modal" id="skillsModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Skills</h5>
        </div>
        <form action="{{url('student/save-skills')}}" method="POST">
            @csrf
            <div class="modal-body">
                <input type="hidden" name="skid" id="skid">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Skills</label>
                        <input type="text" data-role="tagsinput" name="skills_input" id="skills_input"/>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
      </div>
    </div>
  </div>

   {{-- modal --}}
   <div class="modal" id="addCertificationsModal" tabindex="-1">
    <div class="modal-dialog">
       <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Certifications</h5>
        </div>
        <form action="{{ url('student/save-certification') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
              <input type="hidden" name="cid" id="cid">
              <div class="col-md-12">
                  <div class="form-group">
                      <label for="">Certification Name</label>
                      <input type="text" class="form-control" name="cert_name" id="cert_name">
                  </div>
                  <div class="form-group">
                      <label for="">Certification Author</label>
                      <input type="text" class="form-control" name="cert_author" id="cert_author">
                  </div>
                  <div class="form-group">
                      <label for="">Certification Address</label>
                      <input type="text" class="form-control" name="cert_address" id="cert_address">
                  </div>
                  <div class="form-group">
                    <label for="">Date Given</label>
                    <input type="date" id="from_date" class="form-control" name="from_date" value="2022-01-18" placeholder="Enter Start Date">
                  </div>
                  <div class="form-group">
                    <label for="">Attachment Filename</label>
                    <input type="file" class="form-control" name="attachment_filename" id="attachment_filename">
                  </div>
                  <div class="form-group">
                    <label for="">Expiration</label>
                    <input type="date" id="from_date" class="form-control" name="from_date" value="2022-01-18" placeholder="Enter Start Date">
                  </div>
              </div>
          </div>

          <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
   </div>

  {{-- modal --}}
  <div class="modal fade" id="projectModal" tabindex="-1">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Project</h5>
            </div>
            <form action="{{ url('student/save-project') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <input type="hidden" name="pid" id="pid">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" class="form-control" name="project_title" id="project_title">
                    </div>
                    <div class="form-group">
                        <label for="">Position</label>
                            <input type="text" class="form-control" name="position" id="position">
                        </div>
                    <div class="form-group">
                    <label for="">Description</label>
                        <input type="text" class="form-control" name="project_description" id="project_description">
                    </div>
                    <div class="form-group">
                    <label for="">Date Established</label>
                        <input type="date" class="form-control" name="date_established" id="date_established">
                    </div>
                    <div class="form-group">
                        <label for="">Url</label>
                            <input type="text" class="form-control" name="url" id="url">
                    </div>
                    <div class="form-group">
                        <label for="">File Upload</label>
                            <input type="file" class="form-control" name="file_upload" id="file_upload">
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
         </div>
         </form>
      </div>
   </div>
  </div>

  {{-- modal --}}
<div class="modal" id="OrganizationsModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Organization</h5>
        </div>
        <form action="{{ url('student/save-org') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <input type="hidden" name="org_id" id="org_id">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Organization Name</label>
                        <input type="text" class="form-control"  name="org_name" id="org_name">
                    </div>
                    <div class="form-group">
                        <label for="">Associated With</label>
                        <input type="text" class="form-control"  name="org_associated_with" id="org_associated_with">
                    </div>
                    <div class="form-group">
                        <label for="">Position</label>
                        <input type="text" class="form-control"  name="position" id="position">
                    </div>
                    <div class="form-group">
                        <label for="">Start Date</label>
                        <input type="date" name="start_date" id="start_date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">End Date</label>
                        <input type="date" name="end_date" id="end_date" class="form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
      </div>
    </div>
  </div>

  {{-- modal --}}
  <div class="modal" id="SeminarsModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Seminar</h5>
        </div>
        <form action="{{ url('student/save-seminar') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <input type="hidden" name="s_id" id="s_id">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" class="form-control" name="seminar_title" id="seminar_title">
                    </div>
                    <div class="form-group">
                        <label for="">Venue</label>
                        <textarea class="form-control" name="seminar_venue" id="seminar_venue"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Type</label><br>
                        <select  class="form-control" type="type" name="seminar_type" id="seminar_type">
                            <option value="">Select</option>
                            <option value="provincial">Provincial</option>
                            <option value="regional">Regional</option>
                            <option value="local">Local</option>
                            <option value="internationl">International</option>
                          </select>
                    </div>
                    <div class="form-group">
                        <label for="">Date Given</label>
                        <input class="form-control" type="date" name="from_date" id="from_date">
                    </div>
                    <div class="form-group">
                        <label for="">Attachment Filename</label>
                        <input class="form-control" type="file" name="attachment_filename" id="attachment_filename">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('user-js')
    <link rel="stylesheet" href="{{ url('assets/css/tagsinput.css') }}">
    <script src="{{ url('assets/js/tagsinput.js') }}"></script>
    <script src="https://unpkg.com/bootstrap-switch"></script>
    <script>
        $(document).ready(function(){
            $("[name='my-checkbox']").bootstrapSwitch({
                'onText': 'Private',
                'offText': 'Public',
                'size': 'small'
            });

            $('#skills_input').tagsinput('items');

            $("#addEduc").on('click', function(){
                $("#educBackgroundModal").modal('show');
            });

            $("#level").on("change",function(){
                if($(this).val() == "College") {
                    $("#course").removeAttr("hidden","hidden");
                } else {
                    $("#course").attr("hidden","hidden");
                }
            });
            $("#level").on("change",function(){
                if($(this).val() == "Senior High") {
                    $("#strandtrack").removeAttr("hidden","hidden");
                } else {
                    $("#strandtrack").attr("hidden","hidden");
                }
            });



            $(".btnEditEduc").on('click', function (){
                const i = $(this).attr('data-value');
                $.ajax({
                    url: "{{ url('/student/edit-educ') }}",
                    type: "POST",
                    data: {i:i,'_token':$('meta[name="csrf-token"]').attr('content')},
                    success: function (response)
                    {
                        if (response) {
                            $("#level").val(response[0].educ_level);
                            $("#institution_name").val(response[0].institution_name);
                            $("#institution_addr").val(response[0].institution_address);
                            $("#course").val(response[0].degree != null ? response[0].degree : '');
                            $("#strandtrack").val(response[0].degree != null ? response[0].degree : '');
                            $("#from").val(response[0].from);
                            $("#to").val(response[0].to);
                            $("#eid").val(response[0].id);

                            $("#educBackgroundModal").modal('show');
                        } else {
                            $("#educBackgroundModal").modal('hide');
                        }
                    }
                });
            });

            $(".btnDeleteEduc").on('click', function (){
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
                            url: "{{ url('/student/delete-educ') }}",
                            type: "POST",
                            data: {i:i,'_token':$('meta[name="csrf-token"]').attr('content')},
                            success: function (response)
                            {
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

            $("#addExperience").on('click', function(){
                $("#experienceModal").modal('show');
            });

            $('.btnEditExperience').on('click', function(){
                const i = $(this).attr('data-value');
                // console.log()
                // alert($(this).attr('data-value'));
                $.ajax({
                    url: "{{ url('/student/edit-experience') }}",
                    type: "POST",
                    data: {i:i,'_token':$('meta[name="csrf-token"]').attr('content')},
                    success: function (response)
                    {
                        // console.log(response);
                        if (response) {
                            $('#company_name').val(response[0].company);
                            $('#job_title').val(response[0].job_title);
                            $('#company_addr').val(response[0].job_address);
                            $('#start_date').val(response[0].start_date);
                            $('#end_date').val(response[0].end_date);
                            $('#ex_id').val(response[0].id);

                            $("#experienceModal").modal('show');
                        } else {
                            $("#experienceModal").modal('hide');
                        }
                    }
                });
            });

            $("#addAwardsAchievementsModal").on('click', function(){
                $("#addAwardsAchievementsModal").modal('show');
            });

            $('.btnEditAwardsAchievements').on('click', function(){
                const i = $(this).attr('data-value');
                // console.log()
                // alert($(this).attr('data-value'));
                $.ajax({
                    url: "{{ url('/student/edit-awardsachievement') }}",
                    type: "POST",
                    data: {i:i,'_token':$('meta[name="csrf-token"]').attr('content')},
                    success: function (response)
                    {
                        // console.log(response);
                        if (response) {
                            $('#title').val(response[0].title);
                            $('#description').val(response[0].description);
                            $('#issuer').val(response[0].issuer);
                            $('#venue').val(response[0].venue);
                            $('#date_given').val(response[0].date_given);
                            $('#aid').val(response[0].id);

                            $("#addAwardsAchievementsModal").modal('show');
                        } else {
                            $("#addAwardsAchievementsModal").modal('hide');
                        }
                    }
                });
            });

            $('.btn-edit-skills').on('click', function(){
                const i = $(this).attr('data-value');
                // console.log()
                // alert($(this).attr('data-value'));
                $.ajax({
                    url: "{{ url('/student/edit-skills') }}",
                    type: "POST",
                    data: {i:i,'_token':$('meta[name="csrf-token"]').attr('content')},
                    success: function (response)
                    {
                        if (response) {
                            $('#skills_input').tagsinput('add',response[0].skills);
                            $('#skid').val(response[0].id);

                            $("#skillsModal").modal('show');
                        } else {
                            $("#skillsModal").modal('hide');
                        }
                    }
                });
            });

            $('.btn-delete-skills').on('click', function(){
                const i = $(this).attr('data-value');
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
                            url: "{{ url('/student/delete-skills') }}",
                            type: "POST",
                            data: {i:i,'_token':$('meta[name="csrf-token"]').attr('content')},
                            success: function (response)
                            {
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

            $('.btnEditCertification').on('click', function(){
                const i = $(this).attr('data-value');
                // console.log()
                // alert($(this).attr('data-value'));
                $.ajax({
                    url: "{{ url('/student/edit-certification') }}",
                    type: "POST",
                    data: {i:i,'_token':$('meta[name="csrf-token"]').attr('content')},
                    success: function (response)
                    {
                        // console.log(response);
                        if (response) {
                            $('#cert_name').val(response[0].cert_name);
                            $('#cert_author').val(response[0].cert_author);
                            $('#cert_address').val(response[0].cert_address);
                            $('#date_give').val(response[0].date_give);

                            $('#cid').val(response[0].id);

                            $("#addCertificationsModal").modal('show');
                        } else {
                            $("#addCertificationsModal").modal('hide');
                        }
                    }
                });
            });

            $('.btnEditProjects').on('click', function(){
                const i = $(this).attr('data-value');
                // console.log()
                // alert($(this).attr('data-value'));
                $.ajax({
                    url: "{{ url('/student/edit-project') }}",
                    type: "POST",
                    data: {i:i,'_token':$('meta[name="csrf-token"]').attr('content')},
                    success: function (response)
                    {
                         console.log(response);
                        if (response) {
                            $('#project_title').val(response[0].project_title);
                            $('#position').val(response[0].position);
                            $('#project_description').val(response[0].project_description);
                            $('#date_established').val(response[0].date_established);
                            $('#url').val(response[0].url);

                            $('#pid').val(response[0].id);

                            $("#projectModal").modal('show');
                        } else {
                            $("#projectModal").modal('hide');
                        }
                    }
                });
            });

            $('.btnEditSeminar').on('click', function(){
                const i = $(this).attr('data-value');
                // console.log()
                // alert($(this).attr('data-value'));
                $.ajax({
                    url: "{{ url('/student/edit-seminar') }}",
                    type: "POST",
                    data: {i:i,'_token':$('meta[name="csrf-token"]').attr('content')},
                    success: function (response)
                    {
                         console.log(response);
                        if (response) {
                            $('#seminar_title').val(response[0].title);
                            $('#seminar_venue').val(response[0].venue);
                            $('#from_date').val(response[0].date_given);
                            // $('#attachment_filename').val(response[0].attachment_filename);

                            $('#s_id').val(response[0].id);

                            $("#SeminarsModal").modal('show');
                        } else {
                            $("#SeminarsModal").modal('hide');
                        }
                    }
                });
            });


            $('.btnEditOrg').on('click', function(){
                const i = $(this).attr('data-value');
                // console.log()
                // alert($(this).attr('data-value'));
                $.ajax({
                    url: "{{ url('/student/edit-org') }}",
                    type: "POST",
                    data: {i:i,'_token':$('meta[name="csrf-token"]').attr('content')},
                    success: function (response)
                    {
                         console.log(response);
                        if (response) {
                            $('#org_name').val(response[0].org_name);
                            $('#org_associated_with').val(response[0].org_associated_with);
                            $('#position').val(response[0].position);
                            $('#start_date').val(response[0].start_date);
                            $('#end_date').val(response[0].end_date);

                            $('#org_id').val(response[0].id);

                            $("#OrganizationsModal").modal('show');
                        } else {
                            $("#OrganizationsModal").modal('hide');
                        }
                    }
                });
            });



            $('.btnDelExperience').on('click', function(){
                const i = $(this).attr('data-value');
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
                            url: "{{ url('/student/delete-experience') }}",
                            type: "POST",
                            data: {i:i,'_token':$('meta[name="csrf-token"]').attr('content')},
                            success: function (response)
                            {
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
                                            window.location.reload(); //BOM
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

            $('.btnDelAwardsAchievements').on('click', function(){
                const i = $(this).attr('data-value');
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
                            url: "{{ url('/student/delete-awardsachievement') }}",
                            type: "POST",
                            data: {i:i,'_token':$('meta[name="csrf-token"]').attr('content')},
                            success: function (response)
                            {
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
            $('.btnDelCertification').on('click', function(){
                const i = $(this).attr('data-value');
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
                            url: "{{ url('/student/delete-certification') }}",
                            type: "POST",
                            data: {i:i,'_token':$('meta[name="csrf-token"]').attr('content')},
                            success: function (response)
                            {
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
            $('.btnDelProjects').on('click', function(){
                const i = $(this).attr('data-value');
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
                            url: "{{ url('/student/delete-project') }}",
                            type: "POST",
                            data: {i:i,'_token':$('meta[name="csrf-token"]').attr('content')},
                            success: function (response)
                            {
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
            $('.btnDelSeminar').on('click', function(){
                const i = $(this).attr('data-value');
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
                            url: "{{ url('/student/delete-seminar') }}",
                            type: "POST",
                            data: {i:i,'_token':$('meta[name="csrf-token"]').attr('content')},
                            success: function (response)
                            {
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
            
              $('.btnDelOrg').on('click', function(){
                const i = $(this).attr('data-value');
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
                            url: "{{ url('/student/delete-org') }}",
                            type: "POST",
                            data: {i:i,'_token':$('meta[name="csrf-token"]').attr('content')},
                            success: function (response)
                            {
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





            $('#educBackgroundModal').on('hidden.bs.modal', function (e) {
                $(this)
                .find("input,textarea,select")
                .val('')
                .end()
                .find("input[type=checkbox], input[type=radio]")
                .prop("checked", "")
                .end();
            });

            $("#addSkills").on('click', function(){
                $("#skillsModal").modal('show');
            });

            $("#addAwardsAchievements").on('click', function(){
                $("#addAwardsAchievementsModal").modal('show');
            });

            $("#addCertification").on('click', function(){
                $("#addCertificationsModal").modal('show');
            });

            $("#addProject").on('click', function(){
                $("#projectModal").modal('show');
            });

            $("#addOrganization").on('click', function(){
                $("#OrganizationsModal").modal('show');
            });
            
             $("#addOrganization").on('click', function(){
                $("#OrganizationsModal").modal('show');
            });

            $("#addSeminar").on('click', function(){
                $("#SeminarsModal").modal('show');
            });
        });
    </script>
@endsection

