﻿<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>TUTOR | STUDENT'S DETAILS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{URL::asset('public/css/bootstrap.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('public/css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('public/css/preview.min.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('public/css/font-awesome.min.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('public/css/normalize.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('public/css/demo.css')}}" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css" rel="stylesheet"/>

    <link href="{{URL::asset('public/css/component.css')}}" rel="stylesheet"/>

    {{--<link href="css/bootstrap.css" rel="stylesheet" />--}}
    {{--<link href="css/bootstrap.min.css" rel="stylesheet" />--}}
    {{----}}
    {{--<link href="css/preview.min.css" rel="stylesheet" />--}}
    <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
    {{--<link href="css/font-awesome.min.css" rel="stylesheet" />--}}
    {{----}}
    {{----}}
    {{----}}
    {{--<!---Tabble css--------------->--}}
    {{----}}
    {{----}}
    {{--<link rel="stylesheet" type="text/css" href="css/normalize.css" />--}}
    {{--<link rel="stylesheet" type="text/css" href="css/demo.css" />--}}
    {{--<link rel="stylesheet" type="text/css" href="css/component.css" />--}}
    {{----}}


    <![endif]-->
    <style>
        #idValue:hover{
            cursor: not-allowed;
        }
        #idValue2:hover{
            cursor: not-allowed;
        }
    </style>
</head>
<body class=" ">
<script type="text/javascript">
    var APP_URL = {!! json_encode(url('/')) !!}
    var token = '{!! csrf_token() !!}'

</script>
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="brand pull-left">TUTOR | STUDENT'S DETAILS</div>
            <div class="brand pull-right">
                <i class="fa fa-dashboard" style="font-size:24px;color:grey"></i>
                <a href="{{url('daily-work-entry/show')}}" style="font-size:18px; color:grey; ">Home</a>
                <i class="fa fa-calendar" style="font-size:24px;color:grey"></i>
                <a href="javascript:void(0)"  data-toggle="modal" data-target="#myModalWeek" style="font-size:18px; color:grey; ">Add Week</a>
                <i class="fa fa-address-book-o" style="font-size:24px;color:grey"></i>
                <a href="javascript:void(0)"  data-toggle="modal" data-target="#myModal" style="font-size:18px; color:grey; ">Add Contact</a>
                <i class="fa fa-address-book" style="font-size:24px;color:grey"></i>
                <a href="javascript:void(0)"  data-toggle="modal" data-target="#myModal2" style="font-size:18px; color:grey; ">show Contact</a>
                <i class="fa fa-money" style="font-size:24px;color:grey"></i>
                <a href="{{url('payment-history')}}" style="font-size:18px; color:grey; ">Payment History</a>
                <i class="fa fa-sign-out" style="font-size:24px;color:red"></i> <a
                        href="{{ url('/logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" style="font-size:18px; color:#FF0000; ">Logout</a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>

            </div>


            <!-- /.nav-collapse -->
        </div>
    </div>
    <!-- /navbar-inner -->
</div>


<div class="divider large visible-desktop"></div>
<div class="divider  hidden-desktop"></div>

<div class="container-fluid">
    <div id="demo-5" class="row-fluid">
        <!-- <h1 class="clearfix text-center heading-4"></h1>-->
        <div class="row-fluid">
            <div class="col-md-12">

                <div class="tabbable custom-tabs tabs-animated flat large shadow  track-url auto-scroll">
                    <ul class="nav nav-tabs">
                        @foreach($contactData as $keycontact => $valuecontact)

                            <li class="{{($keycontact == 0) ? 'active': ''}}">
                                <a
                                        class="{{($keycontact == 0) ? 'active': ''}}"
                                        href="#{{$valuecontact->phone_no.'-'.$keycontact}}"
                                        data-toggle="tab" data-react-id="{{$valuecontact->phone_no.'-'.$keycontact}}">
                                    <h4>{{$valuecontact->user_name}}</h4>
                                    {{$valuecontact->phone_no}}</a></li>
                    @endforeach
                    {{--<li><a href="#panel5-2" data-toggle="tab">Phone 2</a></li>--}}
                    {{--<li><a href="#panel5-3" data-toggle="tab">Phone 3</a></li>--}}
                    <!--<li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-angle-down"></i>Dropdown </a>
                                <ul class="dropdown-menu">
                                    <li class="active"><a class="active" href="#panel5-1" data-toggle="tab">Panel 1</a></li>
                                    <li><a href="#panel5-2" data-toggle="tab">Panel 2</a></li>
                                    <li><a href="#panel5-3" data-toggle="tab">Panel 3</a></li>
                                </ul>
                            </li>-->

                    </ul>

                    <div class="tab-content">
                        @foreach($contactData as $keycontact => $valuecontact)

                            <div id="{{$valuecontact->phone_no.'-'.$keycontact}}"
                                 class="tab-pane {{($keycontact == 0) ? 'active': ''}}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="tabbable custom-tabs tabs-animated flat large shadow  track-url auto-scroll">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a href="#panel5-1-1{{$valuecontact->phone_no}}" data-toggle="tab">Daily Work
                                                        Activity</a></li>
                                                <li><a href="#panel5-1-2{{$valuecontact->phone_no}}" data-toggle="tab">Courses</a></li>
                                                <li><a href="#panel5-1-3{{$valuecontact->phone_no}}" data-toggle="tab">Payment Remaining</a></li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="panel5-1-1{{$valuecontact->phone_no}}">
                                                    <div style="overflow: auto; width:100%;">
                                                        <table class="datatable">
                                                            <thead>
                                                            <tr>
                                                                <th>S No</th>
                                                                <th>Date and Time</th>
                                                                <th>Student Name</th>
                                                                <th>
                                                                    <div align="center">Type</div>
                                                                </th>
                                                                <th>
                                                                    <div align="center">Status</div>
                                                                </th>
                                                                <th>Tutor's Name</th>
                                                                <th>Tutor's Price</th>
                                                                <th >Price</th>
                                                                <th>Due Time (in number of hours)</th>
                                                                <th> Branch Name</th>
                                                                <th>Subject Name</th>
                                                                <th>
                                                                    <div align="center">Online / Offline / Both</div>
                                                                </th>
                                                                <th>Website Link</th>
                                                                <th>User ID</th>
                                                                <th>Password</th>

                                                                <th>Team Member’s Name</th>
                                                                <th>Tutor’s comment</th>
                                                                 <th>Student’s comment</th>
                                                                <th>Edit</th>
                                                            </tr>

                                                            </thead>


                                                            <tbody>
                                                            @php

                                                                       $students = $valuecontact->dailyWorkReport()->get();
                                                                      $q = 0;
                                                            @endphp

                                                            @foreach($students as $student)
                                                                <tr>
                                                                    <td>{{$q+1}}</td>
                                                                    <td>{{ date('d-M-Y h:i:s',strtotime($student->created_at) ) }}</td>
                                                                    <td>{{$student->student_name}}</td>
                                                                    <td>{{$student->type}}</td>
                                                                    <td>
                                                                        @if($student->status == -1)
                                                                            AcademicBro@-1@
                                                                        @endif
                                                                        @if($student->status == 0)
                                                                            AcademicBro@0@
                                                                        @endif
                                                                        @if($student->status == 1)
                                                                            AcademicBro@1@
                                                                        @endif
                                                                    </td>
                                                                    <td>{{$student->tutor_name}}</td>
                                                                    <td>{{$student->tutor_price}}</td>
                                                                    <td>${{$student->price}}</td>
                                                                    <td>
                                                                        @php

                                                                            $current_date = \Illuminate\Support\Carbon::now();
                                                                            $created_at = strtotime($student->created_at);
                                                                            $time = strtotime($current_date) - $created_at;
                                                                            if(floatval(bcdiv($time/3600,1,2)) < floatval($student->due_time)){
                                                                            $final = floatval($student->due_time) - floatval(bcdiv($time/3600,1,2));
                                                                            }
                                                                            else{
                                                                            $final = 'Due time passed.';
                                                                            }

                                                                        @endphp
                                                                        {{$final}}</td>
                                                                    <td>{{$student->branch_name}}</td>
                                                                    <td>{{$student->subject_name}}</td>
                                                                    <td>{{$student->on_off_line}}</td>
                                                                    <td><a href="http://{{$student->website_link}}" target="_blank">{{$student->website_link}}</a>
                                                                    </td>
                                                                    <td>{{$student->user_id}}</td>
                                                                    <td>{{$student->password}}</td>
                                                                    <td>{{$student->student_contact_no}}</td>
                                                                    <td>{{$student->mobile}}</td>




                                                                      <td>{{$student->comment}}</td>
                                                                    <td>
                                                                        <input type="button" class="btn btn-sm btn-success" id="editdailywork" data-react-id="{{$student->id}}" value="Edit">
                                                                        <a href="{{url('daily-work-entry/delete').'/'.$student->id}}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-sm btn-danger">Delete</a></td>


                                                                </tr>


                                                                @php
                                                                    $q++;
                                                                @endphp
                                                            @endforeach

                                                            </tbody>
                                                        </table>

                                                       </div>
                                                    <h1>Add New Data</h1>
                                                    <div style="overflow: auto; width: 100%;">
                                                        <form method="post"
                                                              action="{{ url('/daily-work-entry/add')  }}">
                                                            <input type="hidden" name="redirect_hash" value="{{$valuecontact->phone_no.'-'.$keycontact}}">
                                                            <table >
                                                                <thead>
                                                                <tr>
                                                                    <th rowspan="2">S No</th>
                                                                    <th rowspan="2">Date and Time</th>
                                                                    <th rowspan="2">Student Name</th>
                                                                    <th rowspan="2">Team Member’s Name</th>
                                                                    <th rowspan="2">Tutor’s comment</th>

                                                                    <th colspan="3">
                                                                        <div align="center">Online/Offline

                                                                            <select required class="form-control show-tick"
                                                                                    id="on_off_line" name="on_off_line">
                                                                                <option value="">-- Please select --
                                                                                </option>
                                                                                <option value="Online">Online</option>
                                                                                <option value="Offline">Offline</option>
                                                                                <option value="Both">Both</option>
                                                                            </select>
                                                                        </div>
                                                                    </th>

                                                                    <th rowspan="2"> Branch Name</th>
                                                                    <th rowspan="2">Subject Name</th>
                                                                    <th rowspan="2">
                                                                        <div align="center">Type

                                                                        </div>
                                                                    </th>
                                                                    <th rowspan="2">
                                                                        <div>Status
                                                                        </div>
                                                                    </th>
                                                                    <th rowspan="2">Price</th>
                                                                    <th rowspan="2">Paid</th>
                                                                    <th rowspan="2">Remaining</th>
                                                                    <th rowspan="2">Due Time (in number of hours)<br />
                                                                        hh:mm</th>
                                                                    <th rowspan="2">Tutor's Name (there can be more than
                                                                        one tutor)

                                                                    </th>
                                                                    <th rowspan="2">Tutor's Price</th>
                                                                    <th rowspan="2">Student’s comment</th>
                                                                    <th rowspan="2">Action</th>
                                                                </tr>


                                                                <tr>

                                                                    <th>Website Link</th>
                                                                    <th>User ID</th>
                                                                    <th>Password</th>
                                                                    {{--<th>Assignment</th>--}}
                                                                    {{--<th>Project</th>--}}
                                                                    {{--<th>Session</th>--}}
                                                                    {{--<th>--}}
                                                                    {{--<div align="center">-1</div>--}}
                                                                    {{--</th>--}}
                                                                    {{--<th>--}}
                                                                    {{--<div align="center">0</div>--}}
                                                                    {{--</th>--}}
                                                                    {{--<th>--}}
                                                                    {{--<div align="center">1</div>--}}
                                                                    {{--</th>--}}

                                                                </tr>
                                                                </thead>
                                                                {{--                                    {{dd($data)}}--}}

                                                                <tbody>


                                                                <tr>
                                                                    {{csrf_field()}}
                                                                    <input type="hidden" name="contact_id"
                                                                           value={{$valuecontact->id}}>

                                                                    <td><input type="text"></td>
                                                                    <td><input type="text" name='created_at'
                                                                               value="{{date('d-M-Y h:i:s')}}"></td>
                                                                    <td><input required type="text" name="student_name"></td>
                                                                    <td><input  type="text" name="student_contact_no">
                                                                    </td>
                                                                    <td><input type="text" name="mobile"></td>
                                                                    <td><input  type="text" name="website_link"></td>
                                                                    <td><input type="text" name="user_id"></td>
                                                                    <td><input type="text" name="password"></td>
                                                                    <td><input required type="text" name="branch_name"></td>
                                                                    <td><input required type="text" name="subject_name"></td>
                                                                    <td>
                                                                        <select required style="width: 200px" class="form-control show-tick"
                                                                                id="type" name="type">
                                                                            <option value="">-- Please select --
                                                                            </option>
                                                                            <option value="assignment">Assignment
                                                                            </option>
                                                                            <option value="project">Project
                                                                            </option>
                                                                            <option value="session">Session
                                                                            </option>
                                                                            <option value="quiz">Quiz
                                                                            </option>

                                                                        </select>
                                                                    </td>
                                                                    <td>    <select required style="width: 100px" class="form-control show-tick"
                                                                                    name="status">
                                                                            <option value="">-- Please select --
                                                                            </option>
                                                                            <option value="-1">-1</option>
                                                                            <option value="0">0</option>
                                                                            <option value="1">1</option>
                                                                        </select></td>
                                                                    {{--<td></td>--}}
                                                                    {{--<td></td>--}}
                                                                    {{--<td></td>--}}
                                                                    {{--<td></td>--}}
                                                                    <td><input type="text" required name="price"></td>
                                                                    <td><input type="text" name="paid"></td>
                                                                    <td><input type="text" id="idValue" readonly name="remaining"></td>
                                                                    <td><input type="text" required name="due_time">
                                                                        <span>hh:mm</span>
                                                                    </td>
                                                                    <td><input required type="text" name="tutor_name"></td>
                                                                    <td><input required type="text" name="tutor_price"></td>
                                                                    <td><input type="text" name="comment"></td>
                                                                    <td><input type="submit" value="Save"></td>


                                                                </tr>


                                                                </tbody>
                                                            </table>


                                                        </form>

                                                    </div>


                                                </div>
                                                <div id="panel5-1-2{{$valuecontact->phone_no}}" class="tab-pane">
                                                    <div style="overflow: auto; width: 100%;">
                                                        <table class="datatable">
                                                            <thead>
                                                            <tr>
                                                                <th>Serial Number</th>
                                                                <th>Date and Time</th>
                                                                <th>Student's Name</th>
                                                                <th>Tutor's Name </th>

                                                                <th>Subject Name</th>
                                                                <th>
                                                                    <div align="center">Online / Offline / Both</div>
                                                                </th>
                                                                <th>Website Link</th>
                                                                <th>User ID</th>
                                                                <th>Password</th>

                                                                <th>
                                                                    <div align="center">Type</div>
                                                                </th>
                                                                <th>Tutor's Price</th>
                                                                <th>Next Due Dates</th>
                                                                <th>Grades</th>
                                                                <th> Branch Name</th>
                                                                <th>Price</th>
                                                                <th>Comment</th>
                                                                <th>Action</th>


                                                            </tr>


                                                            </thead>
                                                            @php
                                                                $courseData = $valuecontact->courses()->get();
                                                            @endphp
                                                            {{--@if(Count($courseData))--}}
                                                            <tbody>

                                                            @foreach($courseData as $key => $course)

                                                                <tr>
                                                                    <td >
                                                                        {{$key+1}}
                                                                    </td>
                                                                    <td >{{date('d-M-y h:i:s',strtotime($course->created_at))}}</td>
                                                                    <td >{{$course->student_name}}</td>
                                                                    <td >{{$course->tutor_name}}</td>
                                                                    <td >{{$course->subject_name}}</td>

                                                                    <td >{{$course->on_off_line}}</td>
                                                                    <td ><a href="http://{{$course->website_link}}" target="_blank">{{$course->website_link}}</a></td>
                                                                    <td >{{$course->user_id}}</td>
                                                                    <td >{{$course->password}}</td>
                                                                    <td >{{$course->type}}</td>
                                                                    <td >{{$course->tutor_price}}</td>
                                                                    <td >{{$course->next_due_date}}</td>
                                                                    <td >{{$course->grades}}</td>
                                                                    <td >{{$course->branch_name}}</td>

                                                                    <td >{{$course->price}}</td>
                                                                    {{--<td >{{$course->paid}}</td>--}}
                                                                    {{--<td >{{$course->remaining}}</td>--}}


                                                                    <td >{{$course->student_contact_no}}</td>
                                                                    <td><input type="button" class="btn btn-sm btn-success" id="editcourse" data-react-id="{{$course->id}}" value="Edit">
                                                                        <a href="{{url('daily-work-entry/delete-course').'/'.$course->id}}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-sm btn-danger">Delete</a></td>




                                                                </tr>

                                                            @endforeach



                                                            </tbody>
                                                        </table>

                                                    </div>

                                                    <h1>Add New Data</h1>
                                                    <div style="overflow: auto; width: 100%;">
                                                        <form method="post"
                                                              action="{{ url('/daily-work-entry/createCourse')  }}">
                                                            <input type="hidden" name="redirect_hash" value="{{$valuecontact->phone_no.'-'.$keycontact}}">
                                                            {{csrf_field()}}
                                                            <table>
                                                                <thead>
                                                                <tr>
                                                                    <th rowspan="2">Serial Number</th>
                                                                    <th rowspan="2">Date and Time </th>
                                                                    <th rowspan="2">Student's Name</th>
                                                                    <th rowspan="2" >Student's Contact No.</th>
                                                                    <th colspan="3"><div style="text-align: center;">
                                                                            <label for="" style="text-align: center">Online / Offline / Both</label>
                                                                            <select class="form-control" required name="on_off_line"><br>

                                                                                <option>-- Please Select --</option>
                                                                                <option>Online</option>
                                                                                <option>Offline</option>
                                                                                <option>Both</option>
                                                                            </select></div>
                                                                    </th>

                                                                    <th rowspan="2"> Branch Name</th>
                                                                    <th rowspan="2">Subject Name</th>
                                                                    <th rowspan="2"><div style="text-align: center;">
                                                                            <label for="" style="text-align: center">Type </label>
                                                                        </div></th>
                                                                    <th rowspan="2">Grades </th>
                                                                    <th rowspan="2">Price </th>
                                                                    <th rowspan="2">Paid</th>
                                                                    <th rowspan="2">Remaining </th>
                                                                    <th rowspan="2">Next Due Dates</th>
                                                                    <th rowspan="2">Tutor's Name (there can be more than one tutor)</th>
                                                                    <th rowspan="2">Tutor's Price </th>
                                                                    <th rowspan="2">Action</th>

                                                                </tr>


                                                                <tr>

                                                                    <th>Website Link</th>
                                                                    <th>User ID</th>
                                                                    <th>Password</th>
                                                                    {{--<th>Assignment</th>--}}
                                                                    {{--<th>All</th>--}}


                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <input type="hidden" name="contact_id"
                                                                           value={{$valuecontact->id}}>
                                                                    <td >&nbsp;</td>
                                                                    <td ><input type="text" value="{{date('d-M-Y h:i:s')}}" name="created_at"></td>
                                                                    <td ><input type="text" required name="student_name"></td>
                                                                    <td><input type="text"  name="student_contact_no"></td>
                                                                    <td ><input type="text"  name="website_link"></td>
                                                                    <td ><input type="text"  name="user_id"></td>
                                                                    <td ><input type="text"  name="password"></td>
                                                                    <td><input type="text" required name="branch_name"></td>
                                                                    <td ><input type="text" required name="subject_name"></td>
                                                                    <td >
                                                                        <select style="width:120px" required class="form-control" name="type">
                                                                            <option>-- Please Select --</option>
                                                                            <option value="hwk">hwk</option>
                                                                            <option value="quiz">quiz</option>
                                                                            <option value="session">session</option>
                                                                            <option value="hwk+quiz">hwk+quiz</option>
                                                                            <option value="hwk+quiz+session">hwk+quiz+session</option>
                                                                            <option value="hwk+session">hwk+session</option>
                                                                            <option value="quiz+session">quiz+session</option>
                                                                            <option value="hwk+quiz+discussion">hwk+quiz+discussion</option>
                                                                            <option value="hwk+discussion">hwk+discussion</option>
                                                                            <option value="quiz+discussion">quiz+discussion</option>
                                                                            <option value="discussion+session">discussion+session</option>
                                                                            <option value="hwk+quiz+discussion+session ">hwk+quiz+discussion+session</option>
                                                                        </select>
                                                                    </td>
                                                                    {{--<td ></td>--}}
                                                                    <td><input type="text" required name="grades"></td>
                                                                    <td ><input type="text" required name="price"></td>
                                                                    <td ><input type="text" required name="paid"></td>
                                                                    <td ><input type="text" id="idValue2" readonly  name="remaining"></td>
                                                                    <td><input type="text" required  name="next_due_date"></td>
                                                                    <td ><input type="text" required name="tutor_name"></td>
                                                                    <td ><input type="text" required name="tutor_price"></td>
                                                                    <td ><input type="submit" value="Save"></td>

                                                                </tr>









                                                                </tbody>
                                                            </table>


                                                        </form>

                                                    </div>
                                                </div>
                                                <div id="panel5-1-3{{$valuecontact->phone_no}}" class="tab-pane">
                                                    <div>
                                                        <h3>Daily Work Payment Remaing</h3>
                                                        <div style="overflow: auto; width: 100%;">
                                                            <table class="datatable">
                                                                <thead>
                                                                <tr>
                                                                    <th>
                                                                        <div align="center">Student Name</div>
                                                                    </th>
                                                                    <th>
                                                                        <div align="center">Student's Contact No.</div>
                                                                    </th>
                                                                    <th>
                                                                        <div align="center">Total</div>
                                                                    </th>
                                                                    <th>
                                                                        <div align="center">Comment</div>
                                                                    </th>


                                                                </tr>


                                                                </thead>
                                                                <tbody>
                                                                @php
                                                                    $distict_student = $valuecontact->dailyWorkReport()->get()->groupBy('student_name');
                                                                $total = 0;
                                                                @endphp
                                                                @foreach($distict_student as $key => $student)
                                                                    @php

                                                                        $final = 0;
                                                                         foreach ($distict_student[$key] as $key_daily => $value_work){
                                                                             $final =  $final +  intval($value_work->remaining);
                                                                         }
                                                                           $total = $total + $final;
                                                                    @endphp
                                                                    @if($final > 0)
                                                                    <tr>
                                                                        <td>
                                                                            {{$key}}
                                                                        </td>
                                                                        <td>{{$distict_student[$key][0]->student_contact_no}}</td>
                                                                        <td>${{$final}}
                                                                            <form method="post"
                                                                                  action="{{ url('/daily-work-entry/pay-daily-work')  }}">
                                                                                {{csrf_field()}}
                                                                                <input type="text" name="amount" >
                                                                                <input type="hidden" value="{{$key}}" name="student_name" >
                                                                                <input type="hidden" value="{{$valuecontact->phone_no}}" name="phone_no" >
                                                                                <input type="hidden" value="{{$valuecontact->user_name}}" name="name" >
                                                                                <input type="submit" value="Pay">
                                                                            </form>
                                                                        </td>
                                                                        <td>{{$distict_student[$key][0]->comment}}</td>
                                                                    </tr>
                                                                    @endif
                                                                @endforeach

                                                                </tbody>
                                                            </table>
                                                            <h4>Total Payment Remaining :- ${{$total}}</h4>

                                                        </div>
                                                    </div>

                                                    <div>
                                                        <h3>Course Payment Remaing</h3>
                                                        <div style="overflow: auto; width: 100%;">

                                                            <table class="datatable">
                                                                <thead>
                                                                <tr>
                                                                    <th>
                                                                        <div align="center">Student Name</div>
                                                                    </th>
                                                                    <th>
                                                                        <div align="center">Student's Contact No.</div>
                                                                    </th>
                                                                    <th>
                                                                        <div align="center">Total</div>
                                                                    </th>



                                                                </tr>


                                                                </thead>
                                                                <tbody>
                                                                @php
                                                                    $distict_student_courses = $valuecontact->courses()->get()->groupBy('student_name');
                                                              $course_total = 0;
                                                                @endphp
                                                                @foreach($distict_student_courses as $key => $student)
                                                                    @php

                                                                        $course_final = 0;
                                                                        foreach ($distict_student_courses[$key] as $key_daily => $value_work){
                                                                             $course_final =  $course_final +  intval($value_work->remaining);
                                                                        }

                                                                    $course_total =  $course_total + $course_final;
                                                                    @endphp
                                                                    @if($course_final > 0)
                                                                    <tr>
                                                                        <td>
                                                                            {{$key}}
                                                                        </td>
                                                                        <td>{{$distict_student_courses[$key][0]->student_contact_no}}</td>
                                                                        <td>${{$course_final}}
                                                                            <form method="post"
                                                                                  action="{{ url('/daily-work-entry/pay-course')  }}">
                                                                                {{csrf_field()}}
                                                                                <input type="text" name="amount" >
                                                                                <input type="hidden" value="{{$key}}" name="student_name" >
                                                                                <input type="hidden" value="{{$valuecontact->phone_no}}" name="phone_no" >
                                                                                <input type="hidden" value="{{$valuecontact->user_name}}" name="name" >
                                                                                <input type="submit" value="Pay">
                                                                            </form></td>

                                                                    </tr>
                                                                    @endif

                                                                @endforeach

                                                                </tbody>
                                                            </table>
                                                            <h4>Total Payment Remaining :- ${{$course_total}}</h4>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
                <div class="divider visible-phone"></div>
            </div>

        </div>

    </div>

    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add New Contact</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" style="padding: 15px" method="post" action="{{url('/add-new-contact')}}">
                        {{csrf_field()}}
                        <div class="form-group" >
                            <label for="contact">User Name</label><br/>
                            <input type="text" name="user_name" class="form-control">
                        </div>
                        <div class="form-group" >
                            <label for="contact">Contact number</label><br/>
                            <input type="text" name="phone_no" class="form-control">
                        </div>
                        <div class="form-group" >
                            <input type="submit"  value="Save" class="btn btn-primary">
                        </div>

                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <div class="divider x-large"></div>
        <div class="divider large"></div>

    </div>
    <div class="modal fade" id="myModal2" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">All Contact</h4>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>User Name</th>
                                <th>Contact Number</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{$i=0}}
                            @foreach($contactData as $keycontact => $valuecontact)
                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td>{{$valuecontact->user_name}}</td>
                                    <td>{{$valuecontact->phone_no}}</td>
                                    <td><a href="{{url('delete-contact'.'/'.$valuecontact->id)}}"
                                           onclick="return confirm('Are you sure you want to delete this item?');"
                                           class="btn btn-danger">Delete</a></td>

                                </tr>
                                {{$i++}}
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <div class="divider x-large"></div>
        <div class="divider large"></div>

    </div>


    <div class="modal fade" id="dailyworkedit" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Daily Work </h4>
                </div>
                <div class="modal-body clearfix">
                    <form class="form-inline" style="padding: 15px" method="post" action="{{url('/daily-work-entry/update-daily-work')}}">
                        {{csrf_field()}}
                        <input type="hidden" id="did" name="did" >
                        <input type="hidden" id="dcreated_at" name="created_at" >
                        <div class="col-sm-4 clearfix">
                            <div class="form-group">
                                <label for="contact" class="control-label">Student Name</label><br/>
                                <input type="text" id="dstudent_name" name="student_name" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-4 clearfix">
                            <div class="form-group" >
                                <label for="contact" class="control-label">Team Member’s Name</label><br/>
                                <input type="text" name="student_contact_no" id="dstudent_contact_no" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-4 clearfix">
                            <div class="form-group" >
                                <label for="contact" class="control-label">Tutor's Comment</label><br/>
                                <input type="text" name="mobile" id="dmobile" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-4 clearfix">
                            <div class="form-group" >
                                <label for="contact" class="control-label">Online / Offline / Both</label><br/>
                                <select required class="form-control show-tick"
                                        id="don_off_line" name="on_off_line">
                                    <option value="">-- Please select --
                                    </option>
                                    <option value="Online">Online</option>
                                    <option value="Offline">Offline</option>
                                    <option value="Both">Both</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4 clearfix">
                            <div class="form-group" >
                                <label for="contact" class="control-label">Website Link</label><br/>
                                <input type="text" name="website_link" id="dwebsite_link" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-4 clearfix">
                            <div class="form-group" >
                                <label for="contact" class="control-label">User Id</label><br/>
                                <input type="text" name="user_id" id="duser_id" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-4 clearfix">
                            <div class="form-group" >
                                <label for="contact" class="control-label">Password</label><br/>
                                <input type="text" name="password" id="dpassword" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-4 clearfix">
                            <div class="form-group" >
                                <label for="contact" class="control-label">Branch Name</label><br/>
                                <input type="text" name="branch_name" id="dbranch_name" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-4 clearfix">
                            <div class="form-group" >
                                <label for="contact" class="control-label">Subject Name</label><br/>
                                <input type="text" name="subject_name" id="dsubject_name" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-4 clearfix">
                            <div class="form-group" >
                                <label for="contact" class="control-label">Type</label><br/>
                                <select required  class="form-control show-tick"
                                        id="dtype" name="type">
                                    <option value="">-- Please select --
                                    </option>
                                    <option value="assignment">Assignment
                                    </option>
                                    <option value="project">Project
                                    </option>
                                    <option value="session">Session
                                    </option>

                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4 clearfix">
                            <div class="form-group" >
                                <label for="contact" class="control-label">Status</label><br/>
                                <select required class="form-control show-tick"
                                        name="status" id="dstatus">
                                    <option value="">-- Please select --
                                    </option>
                                    <option value="-1">-1</option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4 clearfix">
                            <div class="form-group" >
                                <label for="contact" class="control-label">Price</label><br/>
                                <input type="text" name="price" id="dprice" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-4 clearfix">
                            <div class="form-group" >
                                <label for="contact" class="control-label">Paid</label><br/>
                                <input type="text" name="paid" id="dpaid" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-4 clearfix">
                            <div class="form-group" >
                                <label for="contact" class="control-label">Remaining</label><br/>
                                <input type="text" name="remaining" id="dremaining" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-4 clearfix">
                            <div class="form-group" >
                                <label for="contact" class="control-label">Due Time</label><br/>
                                <input type="text" name="due_time" id="ddue_time" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-4 clearfix">
                            <div class="form-group" >
                                <label for="contact" class="control-label">Tutor Name</label><br/>
                                <input type="text" name="tutor_name" id="dtutor_name" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-4 clearfix">
                            <div class="form-group" >
                                <label for="contact" class="control-label">Tutor Price</label><br/>
                                <input type="text" name="tutor_price" id="dtutor_price" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-4 clearfix">
                            <div class="form-group" >
                                <label for="contact" class="control-label">Student's Comment</label><br/>
                                <input type="text" name="comment" id="dcomment" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">

                            <div class="form-group" style="padding-top: 20px;" >
                                <input type="submit"  value="Save" class="btn btn-primary">
                            </div>
                        </div>

                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <div class="divider x-large"></div>
        <div class="divider large"></div>

    </div>

    <div class="modal fade" id="courseedit" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Course</h4>
                </div>
                <div class="modal-body clearfix">
                    <form class="form-inline" style="padding: 15px" method="post" action="{{url('/daily-work-entry/update-course')}}">
                        {{csrf_field()}}
                        <input type="hidden" id="cid" name="cid" >
                        <input type="hidden" id="ccreated_at" name="created_at" >
                        <div class="col-sm-4 clearfix">
                            <div class="form-group">
                                <label for="contact" class="control-label">Student Name</label><br/>
                                <input type="text" id="cstudent_name" name="student_name" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-4 clearfix">
                            <div class="form-group" >
                                <label for="contact" class="control-label">Comment</label><br/>
                                <input type="text" name="student_contact_no" id="cstudent_contact_no" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-4 clearfix">
                            <div class="form-group" >
                                <label for="contact" class="control-label">Online / Offline / Both</label><br/>
                                <select required class="form-control show-tick"
                                        id="con_off_line" name="on_off_line">
                                    <option value="">-- Please select --
                                    </option>
                                    <option value="Online">Online</option>
                                    <option value="Offline">Offline</option>
                                    <option value="Both">Both</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4 clearfix">
                            <div class="form-group" >
                                <label for="contact" class="control-label">Website Link</label><br/>
                                <input type="text" name="website_link" id="cwebsite_link" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-4 clearfix">
                            <div class="form-group" >
                                <label for="contact" class="control-label">User Id</label><br/>
                                <input type="text" name="user_id" id="cuser_id" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-4 clearfix">
                            <div class="form-group" >
                                <label for="contact" class="control-label">Password</label><br/>
                                <input type="text" name="password" id="cpassword" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-4 clearfix">
                            <div class="form-group" >
                                <label for="contact" class="control-label">Branch Name</label><br/>
                                <input type="text" name="branch_name" id="cbranch_name" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-4 clearfix">
                            <div class="form-group" >
                                <label for="contact" class="control-label">Subject Name</label><br/>
                                <input type="text" name="subject_name" id="csubject_name" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-4 clearfix">
                            <div class="form-group" >
                                <label for="contact" class="control-label">Type</label><br/>
                                <select required  class="form-control show-tick"
                                        id="ctype" name="type">
                                    <option value="">-- Please select --
                                    </option>
                                    <option value="assignment">Assignment
                                    </option>
                                    <option value="project">Project
                                    </option>
                                    <option value="session">Session
                                    </option>

                                </select>
                            </div>
                        </div>

                        <div class="col-sm-4 clearfix">
                            <div class="form-group" >
                                <label for="contact" class="control-label">Grades</label><br/>
                                <input type="text" name="grades" id="cgrades" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-4 clearfix">
                            <div class="form-group" >
                                <label for="contact" class="control-label">Price</label><br/>
                                <input type="text" name="price" id="cprice" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-4 clearfix">
                            <div class="form-group" >
                                <label for="contact" class="control-label">Paid</label><br/>
                                <input type="text" name="paid" id="cpaid" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-4 clearfix">
                            <div class="form-group" >
                                <label for="contact" class="control-label">Remaining</label><br/>
                                <input type="text" name="remaining" id="cremaining" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-4 clearfix">
                            <div class="form-group" >
                                <label for="contact" class="control-label">Due Time</label><br/>
                                <input type="text" name="next_due_date" id="cnext_due_date" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-4 clearfix">
                            <div class="form-group" >
                                <label for="contact" class="control-label">Tutor Name</label><br/>
                                <input type="text" name="tutor_name" id="ctutor_name" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-4 clearfix">
                            <div class="form-group" >
                                <label for="contact" class="control-label">Tutor Price</label><br/>
                                <input type="text" name="tutor_price" id="ctutor_price" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">

                            <div class="form-group" style="padding-top: 20px;" >
                                <input type="submit"  value="Save" class="btn btn-primary">
                            </div>
                        </div>

                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <div class="divider x-large"></div>
        <div class="divider large"></div>

    </div>

    <div class="modal fade" id="myModalWeek" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Week</h4>
                </div>
                <div class="modal-body clearfix">
                    <form class="form-inline" style="padding: 15px" method="post" action="{{url('/add-week')}}">
                        {{csrf_field()}}


                        <div class="col-sm-4 clearfix">
                            <div class="form-group">
                                <label for="week_name" class="control-label">Week Name</label><br/>
                                <input type="text" name="week_name" required class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-4 clearfix">
                            <div class="form-group" >
                                <label for="contact" class="control-label">Start Date.</label><br/>
                                <input type="text" name="start_date" required class="form-control datepicker">
                            </div>
                        </div>

                        <div class="col-sm-4 clearfix">
                            <div class="form-group" >
                                <label for="contact" class="control-label">End Date</label><br/>
                                <input type="text" name="end_date" required class="form-control datepicker">
                            </div>
                        </div>

                        <div class="col-md-12">

                            <div class="form-group" style="padding-top: 20px;" >
                                <input type="submit"  value="Save" class="btn btn-primary">
                            </div>
                        </div>

                    </form>
                    <br />
                    <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Week Name</th>
                                    <th>Start date</th>
                                    <th>End date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($weeks as $keyweek => $valueweek)
                                    <tr>
                                        <td>{{$keyweek+1}}</td>
                                        <td>{{$valueweek->week_name}}</td>
                                        <td>{{$valueweek->start_date}}</td>
                                        <td>{{$valueweek->end_date}}</td>
                                        <td><a href="{{url('show-week-report'.'/'.$valueweek->id)}}" class="btn btn-success">Show</a>
                                            <a href="javascript:void(0)" data-react-id="{{$valueweek->id}}" id="editWeek" class="btn btn-primary">Edit</a></td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <div class="divider x-large"></div>
        <div class="divider large"></div>

    </div>

    <div class="modal fade" id="weekedit" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Update Week</h4>
                </div>
                <div class="modal-body clearfix">
                    <form class="form-inline" style="padding: 15px" id="weekForm" method="post" action="{{url('/update-week')}}">
                        {{csrf_field()}}


                        <div class="col-sm-4 clearfix">
                            <div class="form-group">
                                <label for="week_name" class="control-label">Week Name</label><br/>
                                <input type="text" name="week_name" id="week_name" required class="form-control">
                                <input type="hidden" name="id" id="week_id">
                            </div>
                        </div>
                        <div class="col-sm-4 clearfix">
                            <div class="form-group" >
                                <label for="contact" class="control-label">Start Date.</label><br/>
                                <input type="text" name="start_date" id="start_date" required class="form-control datepicker">
                            </div>
                        </div>

                        <div class="col-sm-4 clearfix">
                            <div class="form-group" >
                                <label for="contact" class="control-label">End Date</label><br/>
                                <input type="text" name="end_date" id="end_date" required class="form-control datepicker">
                            </div>
                        </div>

                        <div class="col-md-12">

                            <div class="form-group" style="padding-top: 20px;" >
                                <input type="submit" id="submit_Form_Btn"  value="Update" class="btn btn-primary">
                            </div>
                        </div>

                    </form>
                    <br />


                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <div class="divider x-large"></div>
        <div class="divider large"></div>

    </div>
</div>

{{--<script src="{{URL::asset('public/js/jquery-1.9.1.min.js')}}"></script>--}}
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js"></script>
{{--<script src="{{URL::asset('public/js/jquery.stickyheader.js')}}"></script>--}}
<script src="{{URL::asset('public/js/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('public/js/tabs-addon.js')}}"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
{{--<script src="{{URL::asset('public/js/script.js')}}"></script>--}}
{{--<script src="{{URL::asset('public/js/script.js')}}"></script>--}}


{{--<script src="js/jquery-1.9.1.min.js"></script>--}}
{{--<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>--}}
{{--<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>--}}
{{--<script src="js/jquery.stickyheader.js"></script>--}}
{{--<script src="js/bootstrap.min.js"></script>--}}
{{--<script src="js/tabs-addon.js"></script>--}}


<script type="text/javascript">
    $(function () {
        $('.datatable').DataTable();
        $('.datepicker').datepicker({
            autoclose: true,
        });

        $.fn.modal.Constructor.prototype.enforceFocus = function() {};
        $(document).on('click','#editWeek',function () {
            var id = $(this).attr('data-react-id');
            $.ajax({
                type: "GET",
                url: APP_URL + '/edit-week/' + id,
                data: id,
                success: function(data) {
                    $('#week_name').val(data.week_name);
                    $('#start_date').val(data.start_date);
                    $('#end_date').val(data.end_date);
                    $('#week_id').val(data.id);
                    $('#weekedit').modal('show')
                }
            });

        });

        $(document).on('click','#editdailywork',function () {
            var id = $(this).attr('data-react-id');

            $.ajax({
                type: "GET",
                url: APP_URL + '/daily-work-entry/edit-daily-work/' + id,
                data: id,
                success: function(data) {
                    console.log(data);
                    $('#dstudent_name').val(data.student_name);
                    $('#dcreated_at').val(data.created_at);
                    $('#did').val(data.id);
                    $('#dbranch_name').val(data.branch_name);
                    $('#dcomment').val((data.comment == null ? '' : data.comment));
                    $('#ddue_time').val(data.due_time);
                    $('#dmobile').val((data.mobile == null ? '' : data.mobile));
                    $('#don_off_line').val(data.on_off_line);
                    $('#dpaid').val((data.paid == null ? '' : data.paid));
                    $('#dpassword').val((data.password == null ? '' : data.password));
                    $('#dprice').val((data.price == null ? '' : data.price));
                    $('#dremaining').val((data.remaining == null ? '' : data.remaining));
                    $('#dstudent_contact_no').val((data.student_contact_no == null ? '' : data.student_contact_no));
                    $('#duser_id').val((data.user_id == null ? '' : data.user_id));
                    $('#dwebsite_link').val((data.website_link == null ? '' : data.website_link));
                    $('#dstatus').val(data.status);
                    $('#dsubject_name').val(data.subject_name);
                    $('#dtutor_name').val(data.tutor_name);
                    $('#dtutor_price').val(data.tutor_price);
                    $('#dtype').val(data.type);

                    $('#dailyworkedit').modal('show')
                }
            });
        })

        $(document).on('click','#editcourse',function () {
            var id = $(this).attr('data-react-id');

            $.ajax({
                type: "GET",
                url: APP_URL + '/daily-work-entry/edit-course/' + id,
                data: id,
                success: function(data) {
                    console.log(data);
                    $('#cstudent_name').val(data.student_name);
                    $('#ccreated_at').val(data.created_at);
                    $('#cgrades').val(data.grades);
                    $('#cid').val(data.id);
                    $('#cbranch_name').val(data.branch_name);
                    $('#dcomment').val((data.comment == null ? '' : data.comment));
                    $('#cnext_due_date').val(data.next_due_date);
                    $('#dmobile').val((data.mobile == null ? '' : data.mobile));
                    $('#con_off_line').val(data.on_off_line);
                    $('#cpaid').val((data.paid == null ? '' : data.paid));
                    $('#cpassword').val((data.password == null ? '' : data.password));
                    $('#cprice').val((data.price == null ? '' : data.price));
                    $('#cremaining').val((data.remaining == null ? '' : data.remaining));
                    $('#cstudent_contact_no').val((data.student_contact_no == null ? '' : data.student_contact_no));
                    $('#cuser_id').val((data.user_id == null ? '' : data.user_id));
                    $('#cwebsite_link').val((data.website_link == null ? '' : data.website_link));
                    $('#csubject_name').val(data.subject_name);
                    $('#ctutor_name').val(data.tutor_name);
                    $('#ctutor_price').val(data.tutor_price);
                    $('#ctype').val(data.type);
                    $('#courseedit').modal('show')
                }
            });
        })



        $("a[href^='#demo']").click(function (evt) {
            evt.preventDefault();
            var scroll_to = $($(this).attr("href")).offset().top;
            $("html,body").animate({scrollTop: scroll_to - 80}, 600);
        });
        $("a[href^='#bg']").click(function (evt) {
            evt.preventDefault();
            $("body").removeClass("light").removeClass("dark").addClass($(this).data("class")).css("background-image", "url('bgs/" + $(this).data("file") + "')");
            console.log($(this).data("file"));


        });
        $("a[href^='#color']").click(function (evt) {
            evt.preventDefault();
            var elm = $(".tabbable");
            elm.removeClass("grey").removeClass("dark").removeClass("dark-input").addClass($(this).data("class"));
            if (elm.hasClass("dark dark-input")) {
                $(".btn", elm).addClass("btn-inverse");
            }
            else {
                $(".btn", elm).removeClass("btn-inverse");

            }

        });
        $(".color-swatch div").each(function () {
            $(this).css("background-color", $(this).data("color"));
        });
        $(".color-swatch div").click(function (evt) {
            evt.stopPropagation();
            $("body").removeClass("light").removeClass("dark").addClass($(this).data("class")).css("background-color", $(this).data("color"));
        });
        $("#texture-check").mouseup(function (evt) {
            evt.preventDefault();

            if (!$(this).hasClass("active")) {
                $("body").css("background-image", "url(bgs/n1.png)");
            }
            else {
                $("body").css("background-image", "none");
            }
        });

        $("a[href='#']").click(function (evt) {
            evt.preventDefault();

        });

        $("a[data-toggle='popover']").popover({
            trigger: "hover", html: true, placement: "top"
        });


    });

</script>

</body>

</html>
