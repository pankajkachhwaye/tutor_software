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

        .table-filter {
            background-color: #fff;
            border-bottom: 1px solid #eee;
        }
        .table-filter tbody tr:hover {
            cursor: pointer;
            background-color: #eee;
        }
        .table-filter tbody tr td {
            padding: 10px;
            vertical-align: middle;
            border-top-color: #eee;
        }
        .table-filter tbody tr.selected td {
            background-color: #eee;
        }
        .table-filter tr td:first-child {
            width: 38px;
        }
        .table-filter tr td:nth-child(2) {
            width: 35px;
        }
        .ckbox {
            position: relative;
        }
        .ckbox input[type="checkbox"] {
            opacity: 0;
        }
        .ckbox label {
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        .ckbox label:before {
            content: '';
            top: 1px;
            left: 0;
            width: 18px;
            height: 18px;
            display: block;
            position: absolute;
            border-radius: 2px;
            border: 1px solid #bbb;
            background-color: #fff;
        }
        .ckbox input[type="checkbox"]:checked + label:before {
            border-color: #2BBCDE;
            background-color: #2BBCDE;
        }
        .ckbox input[type="checkbox"]:checked + label:after {
            top: 3px;
            left: 3.5px;
            content: '\e013';
            color: #fff;
            font-size: 11px;
            font-family: 'Glyphicons Halflings';
            position: absolute;
        }
        .table-filter .star {
            color: #ccc;
            text-align: center;
            display: block;
        }
        .table-filter .star.star-checked {
            color: #F0AD4E;
        }
        .table-filter .star:hover {
            color: #ccc;
        }
        .table-filter .star.star-checked:hover {
            color: #F0AD4E;
        }
        .table-filter .media-photo {
            width: 35px;
        }
        .table-filter .media-body {
            /*display: block;*/
            /* Had to use this style to force the div to expand (wasn't necessary with my bootstrap version 3.3.6) */
        }
        .table-filter .media-meta {
            font-size: 11px;
            color: #999;
        }
        .table-filter .media .title {
            color: #2BBCDE;
            font-size: 14px;
            font-weight: bold;
            line-height: normal;
            margin: 0;
        }
        .table-filter .media .title span {
            font-size: .8em;
            margin-right: 20px;
        }
        .table-filter .media .title span.pagado {
            color: #5cb85c;
        }
        .table-filter .media .title span.pendiente {
            color: #f0ad4e;
        }
        .table-filter .media .title span.cancelado {
            color: #d9534f;
        }
        .table-filter .media .summary {
            font-size: 14px;
        }
        #idValue:hover{
            cursor: not-allowed;
        }
        #idValue2:hover{
            cursor: not-allowed;
        }
        .button__badge {
            background-color: #fa3e3e;
            border-radius: 2px;
            color: white;
            padding: 1px 3px;
            font-size: 13px;
            position: absolute;
            top: -6px;
            right: 102px;
        }
        /* Define how each icon button should look like */
        .button {
            color: white;
            display: inline-block; /* Inline elements with width and height. TL;DR they make the icon buttons stack from left-to-right instead of top-to-bottom */
            position: relative; /* All 'absolute'ly positioned elements are relative to this one */
            padding: 2px 5px; /* Add some padding so it looks nice */
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
            <div class="brand pull-left"><a href="{{url('tutor-all-semester')}}">TUTOR | STUDENT'S DETAILS</a></div>
            <div class="brand pull-right">
                <i class="fa fa-dashboard" style="font-size:24px;color:grey"></i>
                <a href="{{url('/tutor-dashboard')}}" style="font-size:18px; color:grey; ">Home</a>
                <i class="fa fa-calendar" style="font-size:24px;color:grey"></i>
                <a href="javascript:void(0)"  data-toggle="modal" data-target="#myModalWeek" style="font-size:18px; color:grey; ">Weekly Reports</a>
                <i class="fa fa-bell" style="font-size:24px;color:grey"></i>
                <a href="{{url('/notifications')}}"  style="font-size:18px; color:grey; " class="button">Notification
                    @if(\Illuminate\Support\Facades\Auth::user()->unreadNotifications()->count() > 0)
                        <span class="button__badge">{{\Illuminate\Support\Facades\Auth::user()->unreadNotifications()->count()}}</span>
                    @endif
                </a>
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

        <div class="row-fluid">
            <div class="col-md-12">
                <div style="background: white;padding: 20px;">
                    <section class="content clearfix">
                        <h1>Notifications</h1>
                        <div class="col-md-8 col-md-offset-2">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="pull-right" style="padding: 10px">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-success btn-filter" data-target="pagado">Un-read Notification</button>
                                            <button type="button" class="btn btn-warning btn-filter" data-target="pendiente">All Notification</button>

                                        </div>
                                    </div>
                                    <div class="table-container">
                                        <table class="table table-filter">
                                            <tbody>
                                            @if(\Illuminate\Support\Facades\Auth::User()->unreadNotifications->count() > 0)
                                           @foreach(\Illuminate\Support\Facades\Auth::User()->unreadNotifications as $notification)
                                               <tr data-status="pagado">
                                                <td>
                                                    <div class="media">
                                                        {{--<a href="#" class="pull-left">--}}
                                                            {{--<img src="https://s3.amazonaws.com/uifaces/faces/twitter/fffabs/128.jpg" class="media-photo">--}}
                                                        {{--</a>--}}
                                                        <div class="media-body">
                                                            <span class="media-meta pull-right">{{\Carbon\Carbon::createFromTimeStamp(strtotime($notification->created_at))->diffForHumans()}}</span>
                                                            <h4 class="title">
                                                                {{$notification->data['title']}}
                                                                <span class="pull-right pagado">({{$notification->type == 'App\Notifications\NewEntryDailyWork' ? 'Daily-work':''}}
                                                                    {{$notification->type == 'App\Notifications\NewCourse' ? 'Course':''}}
                                                                    )</span>
                                                            </h4>
                                                            <p class="summary">{{$notification->data['body']}}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                               {{ $notification->markAsRead()}}
                                            @endforeach
                                           @else
                                                <tr data-status="pagado">
                                                    <td>
                                                        <div class="media">
                                                            {{--<a href="#" class="pull-left">--}}
                                                            {{--<img src="https://s3.amazonaws.com/uifaces/faces/twitter/fffabs/128.jpg" class="media-photo">--}}
                                                            {{--</a>--}}
                                                            <div class="media-body">

                                                                <h4 class="title">
                                                                        No unread Notification found
                                                                    <span class="pull-right pagado"></span>
                                                                </h4>

                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endif
                                           @foreach(\Illuminate\Support\Facades\Auth::user()->notifications as $notification)
                                            <tr data-status="pendiente" style="display: none;">
                                                <td>
                                                    <div class="media">
                                                        {{--<a href="#" class="pull-left">--}}
                                                        {{--<img src="https://s3.amazonaws.com/uifaces/faces/twitter/fffabs/128.jpg" class="media-photo">--}}
                                                        {{--</a>--}}
                                                        <div class="media-body">
                                                            <span class="media-meta pull-right">{{\Carbon\Carbon::createFromTimeStamp(strtotime($notification->created_at))->diffForHumans()}}</span>
                                                            <h4 class="title">
                                                                {{$notification->data['title']}}
                                                                <span class="pull-right pagado">({{$notification->type == 'App\Notifications\NewEntryDailyWork' ? 'Daily-work':''}}
                                                                    {{$notification->type == 'App\Notifications\NewCourse' ? 'Course':''}}
                                                                    )</span>
                                                            </h4>
                                                            <p class="summary">{{$notification->data['body']}}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="content-footer">

                            </div>
                        </div>
                    </section>
                </div>
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

        $('.star').on('click', function () {
            $(this).toggleClass('star-checked');
        });

        $('.ckbox label').on('click', function () {
            $(this).parents('tr').toggleClass('selected');
        });

        $('.btn-filter').on('click', function () {
            var $target = $(this).data('target');
            if ($target != 'all') {
                $('.table tr').css('display', 'none');
                $('.table tr[data-status="' + $target + '"]').fadeIn('slow');
            } else {
                $('.table tr').css('display', 'none').fadeIn('slow');
            }
        });

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
