<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>TUTOR | STUDENT'S DETAILS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
        .ui-autocomplete { z-index:2147483647; }
        .modal-body{
            max-height: calc(100vh - 200px);
            overflow-y: auto;
        }
    </style>
</head>
<body class=" ">
<script type="text/javascript">
    var APP_URL = {!! json_encode(url('/')) !!}
    var token = '{!! csrf_token() !!}'
    var users = [];
</script>
@if(session('returnStatus'))
    @include('partials.message')
@endif
@if(isset($users))

    <script type="text/javascript">
        users = {!! json_encode($users) !!}
    </script>


@endif
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
            <div class="col-md-12" style="background: white;padding: 20px;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Semester Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($semesters as $keyweek => $valueweek)
                                    <tr>
                                        <td>{{$keyweek+1}}</td>
                                        <td>{{$valueweek->semester_name}}</td>
                                        <td><a href="{{url('show-tutor-dashboard'.'/'.$valueweek->id)}}" class="btn btn-success">Show</a>
                                            <a href="javascript:void(0)" data-react-id="{{$valueweek->id}}" id="editWeek" class="btn btn-primary">Edit</a></td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="divider visible-phone"></div>
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


</div>

<script src="{{URL::asset('public/js/jquery-1.9.1.min.js')}}"></script>
{{--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js"></script>
{{--<script src="{{URL::asset('public/js/jquery.stickyheader.js')}}"></script>--}}
<script src="{{URL::asset('public/js/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('public/js/tabs-addon.js')}}"></script>
{{--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>--}}
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
{{--<script src="{{//URL::asset('public/js/bootstrap-typeahead.js')}}"></script>--}}
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script src="{{ URL::asset('public/plugins/bootstrap-notify/bootstrap-notify.js')  }}"></script>
<script src="{{URL::asset('public/js/custom.js')}}"></script>
{{--<script src="{{URL::asset('public/js/script.js')}}"></script>--}}


{{--<script src="js/jquery-1.9.1.min.js"></script>--}}
{{--<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>--}}
{{--<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>--}}
{{--<script src="js/jquery.stickyheader.js"></script>--}}
{{--<script src="js/bootstrap.min.js"></script>--}}
{{--<script src="js/tabs-addon.js"></script>--}}


<script type="text/javascript">

</script>

</body>

</html>
