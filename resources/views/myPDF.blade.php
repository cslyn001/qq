<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    <style>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Akshar:wght@300&display=swap" rel="stylesheet">
        body{
            background-color: white !important;
            padding-left: 0 !important;
        }
    		.custom-formating {
                height: fit-content;
    			padding-left: 0;
    			margin: 5px;
    			/* border: solid 2px #111;
    			border-radius: 20px;
    			background-color: #fff;
    			color: #111; */
    		}
            ..in{
                font-family: 'Oswald', sans-serif;
                font-size: 30px;
    
            }
            .year{
                margin: auto;
                position:relative;
                padding-left: 500px;
                bottom: 70px;
            }
            .exp{
                margin: auto;
                position:relative;
                padding-left: 500px;
                bottom: 45px;
            }
             .name{
            font-family: 'Akshar', sans-serif;
            font-size: 35px;
            font-weight: 300;
            color:green;
            padding-left: 165px;
            bottom:200px;
            }
            .add{
                font-family: 'Oswald', sans-serif;
                font-size: 16px;
                font-weight: 150;
                color:darkslategray;
                padding-left: 165px;
            }
            .pic{
                /* margin: auto; */
                position:relative;
                padding-right: 300px;
                bottom: 65px;
            }
            .row{
                font-family: 'Poppins', sans-serif;
                font-size: 15px;
            }
            .award{
                margin: auto;
                position:relative;
                padding-left: 500px;
                bottom: 90px;
            }
            .cert{
                margin: auto;
                position:relative;
                padding-left: 500px;
                bottom: 55px;
            }
            .sem{
                semmargin: auto;
                position:relative;
                padding-left: 500px;
                bottom: 50px;
            }
            .sign{
            margin: auto;
            position:relative;
            padding-left: 300px;
            text-indent: 120px;
            /* bottom: 5px; */
        }
        .applicant{
            margin: auto;
            position:relative;
            padding-left: 327px;
            text-indent: 120px;
            bottom:50px;
            /* bottom: 5px; */
        }
        .obj{
            color:#4C9A2A;
        }
        .educ{
            color:#4C9A2A;
        }
        .ex{
            color:#4C9A2A;
        }
        .ski{
            color:#4C9A2A;
        }
        .awards{
            color:#4C9A2A;
        }
        .certs{
            color:#4C9A2A;
        }
        .sems{
            color:#4C9A2A;
        }


    
    </style>
</head>
<body>
    
    <form action="{{ url('/myPDF') }}" method="POST" enctype="multipart/form-data">
    <div class="custom-formating">
        
        <div class="in">
            <div class="name"> {{$student_name}} </div>
            <div class="add">{{$student_address}} {{$student_brgy}} <br>{{$student_contact_num}} </div>
            
            <div class="pic">
                <img src="{{asset('/documents/'.$prof_pic)}}" alt="" style="width: 150px; height: 150px;">
            </div>
        </div>
        
    <div class="row">
        <div class="obj">
            <h3>Objective</h3>
        </div>
        <div class="objs">
            {{$student_objective}}
        </div>
    </div>
    
        <div class="row">
            <div class="educ">
                <h3>Education</h3>
                <hr>
            </div>
            <div class="col-md-12">
                @if (isset($educations))
                    @foreach ($educations as $row)
    
                    <div class="callout callout-success">
    
                        <b>  {{$row->educ_level}} </b>
                        <br>
                            {{$row->institution_name}}
                        <br>
                        {{$row->institution_address}}
                        <br>
                        {{$row->degree}}
    
                    </div>
                    <div class="year">
                       <p> {{ date('M d, Y', strtotime($row->from)) }} - {{ date('M d, Y', strtotime($row->to)) }} </p>
                    </div>
    
    
                        {{-- @if ($row->educ_level == "College")
                            <p>{{$row->institution_address}} <br>{{$row->educ_level}} {{$row->degree}} <br>{{$row->from}} <br>{{$row->to}}</p>
                        @else
                            <p>{{$row->institution_address}}<br>{{$row->educ_level}} {{$row->degree}}<br>{{$row->from}}<br>{{$row->to}}</p>
                        @endif --}}
    
                    @endforeach
                @endif
            </div>
        </div>
        <div class="row">
            <div class="ex">
                <h3>Experience</h3>
                <hr>
            </div>
        <div class="col-md-12">
            @if (isset($experiences))
                @foreach ($experiences as $row)
                  <div class="callout callout-success">
                      <b>{{$row->job_title}} </b>
                      <br>
                      {{$row->company}}
                      <br>
                      {{$row->job_address}}
                      <div class="exp">
                           {{ date('M d, Y', strtotime($row->start_date)) }} - {{date('M d, Y', strtotime($row->end_date))}}
                        </div>
    
                  </div>
                @endforeach
            @endif
        </div>
    </div>
        <div class="row">
            <div class="ski">
                <h3>Skills</h3>
                <hr>
            </div>
            <div class="col-md-12">
                @if (isset($skills[0]))
                    <div class="callout callout-success">
                        <p> {{ isset($skills[0]) ? str_replace(',', ', ', $skills[0]->skills) : '' }}</p>
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="awards">
                <h3>Awards & Acheivements</h3>
                <hr>
            </div>
            <div class="col-md-12">
                @if (isset($awardsachievement))
                 @foreach ($awardsachievement as $row)
    
                    <div class="callout callout-success">
                        <b>{{$row->title}} </b>
                        <br>
                           {{$row->description}}
                           <br>
                            {{$row->issuer}}
                            <br>
                            {{$row->venue}}
                            <br>
                            {{$row->type}}
                            {{-- <br>
                            {{ date('M d, Y', strtotime($row->date_given))}} <br> --}}
                            <div class="award">
                                <p> {{ date('M d, Y', strtotime($row->date_given))}} <br> </p>
                             </div>
    
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="row">
            <div class="certs">
                <h3>Certificate</h3>
                <hr>
            </div>
            <div class="col-md-12">
            @if (isset($certification))
                @foreach ($certification as $row)
                <div class="callout callout-success">
                    <b>{{$row->cert_name}}</b>
                        <br>
                        {{$row->cert_author}}
                        <br>
                        {{$row->cert_address}}
                        <br>
                        <div class="cert">
                            {{ date('M-d-Y', strtotime($row->date_give))}} - {{ date('M-d-Y', strtotime($row->expiration))}}
                         </div>
                </div>
                @endforeach
            @endif
            </div>
        </div>
        <div class="row">
            <div class="sems">
                <h3>Seminar</h3>
                <hr>
            </div>
            <div class="col-md-12">
                @if (isset($seminar))
                    @foreach ($seminar as $row)
                      <div class="callout callout-success">
                         <b>{{$row->title}}</b>
                              <br>
                              {{$row->venue}}
                              <br>
                              {{$row->venue}}
                              <br>
                            <div class="sem">
                                {{ date('M d, Y', strtotime($row->date_given)) }}
                            </div>
                      </div>
                      <br>
                    @endforeach
                @endif
            </div>
        </div>
        
        <div class="row">
            <div class="sign">
                <h4> <u>{{$student_name}}<u></h4>
                </div>
            </div>
            <div class="row">
                <div class ="applicant">
                <p>Signature of Applicant </p>
                </div>
            </div>
            
    </div>
</body>
</html>