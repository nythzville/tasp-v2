@extends('layouts.teacher.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                @if(session('success'))
                    <div class="alert alert-success">
                    <ul>
                        <li>{{session('success')}}</li>
                    </ul>
                    </div>
                @endif
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="x_panel">
                    <div class="x_title">
                        <h2>My Schedule <small></small></h2>
                        
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        
                        <div id='schedule-calendar'></div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    
     <!-- Start Calender modal -->
    <div id="ScheduleModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">New Schedule</h4>
                </div>
                <div class="modal-body">
                    <div id="testmodal" style="padding: 5px 20px;">
                        {{ Form::open(array( 'action'=> 'Teacher\TeacherScheduleController@store', 'id'=>'antoform', 'class'=>'form-horizontal calender', 'role'=>'form' )) }}
                        <!-- <form id="antoform" class="form-horizontal calender" role="form"> -->
                            <input type="hidden" name="teacher_id" value="{{ $teacher->id }}">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Date</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="schedule-date" name="schedule-date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Time</label>
                                <div class="col-sm-4">
                                    <input type="time" class="form-control" id="from-time" name="from-time">
                                </div>
                                <div class="col-sm-5">
                                    <input type="time" class="form-control" id="to-time" name="to-time">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Status</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="status">
                                        <option value="OPEN">OPEN</option>
                                    </select>
                                </div>
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary antosubmit">Save Schedule</button>
                </div>
            </div>
        </div>
    </div>
    <div id="ScheduleModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel2">Edit Schedule</h4>
                </div>
                <div class="modal-body">

                    <div id="testmodal2" style="padding: 5px 20px;">
                        {{ Form::open(array( 'url'=> 'teacher/'.$teacher->id.'/schedule', 'method' => 'PUT', 'id'=>'edit-schedule-frm', 'class'=>'form-horizontal calender', 'role'=>'form' )) }}

                            <input type="hidden" name="teacher_id" value="{{ $teacher->id }}">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Date</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="edit-schedule-date" name="schedule-date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Time</label>
                                <div class="col-sm-4">
                                    <input type="time" class="form-control" id="edit-from-time" name="from-time">
                                </div>
                                <div class="col-sm-5">
                                    <input type="time" class="form-control" id="edit-to-time" name="to-time">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Status</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="status">
                                        <option value="OPEN">OPEN</option>
                                    </select>
                                </div>
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default antoclose2" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary antosubmit2">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div id="fc_create" data-toggle="modal" data-target="#ScheduleModalNew"></div>
    <!-- <div id="fc_edit" data-toggle="modal" data-target="#ScheduleModalEdit"></div> -->

    <!-- End Calender modal -->
@endsection
