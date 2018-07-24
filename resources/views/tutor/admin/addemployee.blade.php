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
            <div class="brand pull-left"><a href="{{url('all-semesters')}}">TUTOR | STUDENT'S DETAILS</a></div>
            <div class="brand pull-right">
                <i class="fa fa-dashboard" style="font-size:24px;color:grey"></i>
                <a href="{{url('all-semesters')}}" style="font-size:18px; color:grey; ">Home</a>
                <i class="fa fa-calendar" style="font-size:24px;color:grey"></i>
                <a href="javascript:void(0)"  data-toggle="modal" data-target="#myModalSemester" style="font-size:18px; color:grey; ">Add Semester</a>
                <i class="fa fa-key" style="font-size:24px;color:grey"></i>
                <a href="javascript:void(0)"  data-toggle="modal" data-target="#changeCredentials" style="font-size:18px; color:grey; ">Change Admin Credentials</a>
                <i class="fa fa-users" style="font-size:24px;color:grey"></i>
                <a href="{{url('add-employee')}}"  style="font-size:18px; color:grey; ">Add Employee</a>
                <i class="fa fa-address-book-o" style="font-size:24px;color:grey"></i>
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
                <div style="background: white;padding: 20px; ">
                    @if(session('status') && session('status') == 400)
                        <div class="row">
                            <div class="alert alert-danger alert-dismissable ">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Warning!</strong> {{session('message')}}
                            </div>
                        </div>
                    @endif
                    @if(session('status') && session('status') == 100)
                        <div class="row">
                            <div class="alert alert-success alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Success!</strong> {{session('message')}}
                            </div>
                        </div>
                    @endif
                    <h1>Register New Employee</h1>
                    <form class="form-horizontal" style="padding: 15px" method="post" action="{{url('/employee-register')}}">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="form-group col-md-6" >
                                <label for="contact">Name</label><span style="color: red">*</span><br/>
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6" >
                                <label for="contact">Email</label><span style="color: red">*</span><br/>
                                <input type="email" name="email" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6" >
                                <label for="contact">Mobile number</label><br/>
                                <input type="text" name="mobile" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6" >
                                <input type="submit"  value="Register" class="btn btn-primary">
                            </div>
                        </div>

                    </form>

                    <div class="divider visible-phone"></div>
                </div>
            </div>

        </div>

    </div>

    <div class="modal fade" id="myModalSemester" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add New Semester</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" style="padding: 15px" method="post" action="{{url('/add-new-semester')}}">
                        {{csrf_field()}}
                        <div class="form-group" >
                            <label for="contact">Semester Name</label><br/>
                            <input type="text" name="semester_name" class="form-control">
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

    <div class="modal fade" id="changeCredentials" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Change Admin Credentials</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" style="padding: 15px" method="post" action="{{url('/change-admin-credentials')}}">
                        {{csrf_field()}}
                        <div class="form-group" >
                            <label for="contact">Email</label><br/>
                            <input type="email" name="email" required class="form-control">
                        </div>
                        <div class="form-group" >
                            <label for="password">Password</label><br/>
                            <input name="password" required="required" type="password" id="password" class="form-control"/>
                        </div>
                        <div class="form-group" >
                            <label for="password_confirm">Confirm Password</label><br/>
                            <input name="password_confirm" required="required" type="password" id="password_confirm" class="form-control" oninput="check(this)" />
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
        $('#datepicker').datepicker({
            format:'d/mm/yyyy',
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
