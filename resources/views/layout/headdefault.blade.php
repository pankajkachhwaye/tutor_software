@extends('app')

@section('main-content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DAILY WORK REPORT</h2>
            </div>


            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ADD DAILY WORK REPORT
                            </h2>
                        </div>
                        <div class="body">
                            <form method="POST" id="add_attribute" action="{{ url('/daily-work-entry/add')  }}">
                                {{ csrf_field() }}
                                <label class="form-label">Student Name</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text"  name="student_name" required class="form-control">
                                        <input type="hidden"  name="contact_id" value="{{$id}}">

                                    </div>
                                </div>
                                <label class="form-label">Student Contact Number</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text"  name="student_contact_no" required class="form-control">

                                    </div>
                                </div>


                                <label class="form-label">Mobile </label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text"  name="mobile" required class="form-control">

                                    </div>
                                </div>

                                <div>
                                    <label class="form-label">Online/Offline</label>
                                    <div class="col-sm-12">
                                        <select class="form-control show-tick" id="on_off_line" name="on_off_line">
                                            <option value="">-- Please select --</option>
                                            <option value="Online">Online</option>
                                            <option value="Offline">Offline</option>
                                            <option value="Both">Both</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="dependent-form" style="display: none;">
                                    <label class="form-label">Website Link</label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text"  name="website_link" required class="form-control">

                                        </div>
                                    </div>
                                    <label class="form-label">User Id</label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text"  name="user_id" required class="form-control">

                                        </div>
                                    </div>
                                    <label class="form-label">Password</label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text"  name="password" required class="form-control">

                                        </div>
                                    </div>
                                </div>




                                <label class="form-label">Branch Name</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text"  name="branch_name" required class="form-control">

                                    </div>
                                </div>

                                <label class="form-label">Subject Name</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text"  name="subject_name" required class="form-control">

                                    </div>
                                </div>
                                <div>
                                    <label class="form-label">Type</label>
                                    <div class="col-sm-12">
                                        <select class="form-control show-tick" name="type">
                                            <option value="">-- Please select --</option>
                                            <option value="Assignment">Assignment</option>
                                            <option value="Project">Project</option>
                                            <option value="Session">Session</option>
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label" >Status</label>
                                    <div class="col-sm-12">
                                        <select class="form-control show-tick" name="status">
                                            <option value="">-- Please select --</option>
                                            <option value="-1">-1</option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                        </select>
                                    </div>
                                </div>
                                <label class="form-label">Price</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text"  name="price" required class="form-control">

                                    </div>
                                </div><label class="form-label">Paid</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text"  name="paid" required class="form-control">

                                    </div>
                                </div>
                                <label class="form-label">Remaining</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text"  name="remaining" required class="form-control">

                                    </div>
                                </div>
                                <label class="form-label">Due Time</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text"  name="due_time" required class="form-control timepicker">

                                    </div>
                                </div>

                                <div class="attribut-form clearfix">
                                    <div id="entry1" class="row clonedInput">

                                        <div class="col-md-12">
                                            <label class="form-label">Tutor Name</label>
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text"  name="tutor_name[]" value="" required class="form-control input_value">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="counter" value="1" id="counter">
                                    <button type="button" id="btnAdd" name="btnAdd" class="btn btn-info">+</button>
                                    <button type="button" id="btnDel" name="btnDel" class="btn btn-danger">-</button>


                                </div>
                                <br />
                                <label class="form-label">Tutor Price</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text"  name="tutor_price" required class="form-control">

                                    </div>
                                </div>

                                <label class="form-label">Comment</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea  name="comment" required class="form-control"></textarea>

                                    </div>
                                </div>



                                <button type="submit"  class="btn btn-primary m-t-15 waves-effect">Add Work Report</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Vertical Layout | With Floating Label -->



        </div>
    </section>

@endsection
