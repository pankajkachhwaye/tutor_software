<!DOCTYPE html>
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
                <a href="{{url('/tutor-dashboard')}}" style="font-size:18px; color:grey; ">Home</a>
                <i class="fa fa-calendar" style="font-size:24px;color:grey"></i>
                <a href="javascript:void(0)"  data-toggle="modal" data-target="#myModalWeek" style="font-size:18px; color:grey; ">weekly Reports</a>
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

                                                            </tr>

                                                            </thead>


                                                            <tbody>
                                                            @php
                                                            $q = 0;
                                                                $distict_student = $valuecontact->dailyWorkReport()->get();
                                                                $unique_tutor_student = array();
                                                                $totalstudentpayment = 0;
                                                                foreach ($distict_student as $key_stu => $value_stu){
                                                                $decode_name = json_decode($value_stu->tutor_name);
                                                                $decode_price = json_decode($value_stu->tutor_price);
                                                                $explode_name = explode(",",$decode_name);
                                                                $explode_price = explode(",",$decode_price);

                                                                    foreach ($explode_name as $key_name => $value_name){
                                                                       if(Auth::user()->name == $value_name){
                                                                           array_push($unique_tutor_student,$value_stu);
                                                                $totalstudentpayment= $totalstudentpayment + $explode_price[$key_name];
                                                                       }
                                                                       else{
                                                                            continue;
                                                                        }
                                                                    }

                                                                }

                                                            @endphp

                                                            @foreach($unique_tutor_student as $student)
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



                                                                </tr>


                                                                @php
                                                                    $q++;
                                                                @endphp
                                                            @endforeach

                                                            </tbody>
                                                        </table>
                                                        <h3>Payment Total :- ${{$totalstudentpayment}}</h3>

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

                                                                <th>Comment</th>



                                                            </tr>


                                                            </thead>
                                                            @php
                                                                $courseData = $valuecontact->courses()->get();
                                                             $unique_tutor_course = array();
                                                             $totalcoursepayment = 0;
                                                                foreach ($courseData as $key_stu => $value_stu){
                                                                $decode_name = json_decode($value_stu->tutor_name);
                                                                $decode_price = json_decode($value_stu->tutor_price);
                                                                $explode_name = explode(",",$decode_name);
                                                                $explode_price = explode(",",$decode_price);

                                                                    foreach ($explode_name as $key_name => $value_name){
                                                                       if(Auth::user()->name == $value_name){
                                                                           array_push($unique_tutor_course,$value_stu);
                                                                            $totalcoursepayment= $totalcoursepayment + $explode_price[$key_name];
                                                                       }
                                                                       else{
                                                                            continue;
                                                                        }
                                                                    }

                                                                }
                                                            @endphp
                                                            {{--@if(Count($courseData))--}}
                                                            <tbody>

                                                            @foreach($unique_tutor_course as $key => $course)

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




                                                                    <td >{{$course->student_contact_no}}</td>





                                                                </tr>

                                                            @endforeach



                                                            </tbody>
                                                        </table>
                                                        <h3>Payment Total :- ${{$totalcoursepayment}}</h3>


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






    <div class="modal fade" id="myModalWeek" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Week</h4>
                </div>
                <div class="modal-body clearfix">
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
                                            <td><a href="{{url('show-week-report-tutor'.'/'.$valueweek->id)}}" class="btn btn-success">Show</a></td>

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
