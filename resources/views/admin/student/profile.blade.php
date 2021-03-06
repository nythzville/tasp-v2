@extends('layouts.admin.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Student Profile <small></small></h2>
                        
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        @if(session('success'))
                            <div class="alert alert-success">
                            <ul>
                                <li>{{session('success')}}</li>
                            </ul>
                            </div>
                        @endif
                      @if($errors->any())
                          <div class="alert alert-danger">
                          <ul>
                              <li>{{ $errors->first() }}</li>
                          </ul>
                          </div>
                      @endif
                        <div class="col-md-3 col-sm-3 col-xs-12 profile_left">

                            <div class="profile_img">

                                <!-- end of image cropping -->
                                <div id="crop-avatar">
                                    <!-- Current avatar -->
                                    <div class="avatar-view" title="Change the avatar">
                                        <img src="{{url($student->user->user_image)}}" alt="Avatar">
                                    </div>

                                    <!-- Cropping modal -->
                                    <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <form class="avatar-form" action="{{ url('admin/student/'.$student->id.'/crop_image') }}" enctype="multipart/form-data" method="post">
                                                    {{ Form::token() }}
                                                    <div class="modal-header">
                                                        <button class="close" data-dismiss="modal" type="button">&times;</button>
                                                        <h4 class="modal-title" id="avatar-modal-label">Change Porfile Image</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="avatar-body">

                                                            <!-- Upload image and data -->
                                                            <div class="avatar-upload">
                                                                <input class="avatar-src" name="avatar_src" type="hidden">
                                                                <input class="avatar-data" name="avatar_data" type="hidden">
                                                                <label for="avatarInput">Local upload</label>
                                                                <input class="avatar-input" id="avatarInput" name="avatar_file" type="file">
                                                            </div>

                                                            <!-- Crop and preview -->
                                                            <div class="row">
                                                                <div class="col-md-8">
                                                                    <div class="avatar-wrapper"></div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="avatar-preview preview-lg"></div>
                                                                    <div class="avatar-preview preview-md"></div>
                                                                    <div class="avatar-preview preview-sm"></div>
                                                                </div>
                                                            </div>

                                                            <div class="row avatar-btns">
                                                                
                                                                <div class="col-md-12">
                                                                    <button type="submit" class="btn btn-primary btn-block avatar-save" type="submit">Done</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="modal-footer">
                                      <button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
                                    </div> -->
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.modal -->

                                    <!-- Loading state -->
                                    <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
                                </div>
                                <!-- end of image cropping -->

                            </div>
                            <h3> {{ $student->firstname }} {{ $student->lastname }}</h3>

                            <ul class="list-unstyled user_data">
                                <li>
                                    <i class="fa fa-user user-profile-icon"></i> <strong>Birth Date :</strong> {{ date("M j, Y", strtotime($student->dob)) }}
                                </li>
                                <li>
                                    <i class="fa fa-user user-profile-icon"></i> <strong>Age :</strong> {{ date_diff(date_create($student->dob), date_create('now'))->y }} years old
                                <li>
                                    <i class="fa fa-user user-profile-icon"></i> <strong>Gender :</strong> {{ $student->gender }}
                                </li>
                                <li>
                                    <i class="fa fa-user user-profile-icon"></i> <strong>Agent :</strong> {{ $student->getAgent->lastname }} {{ $student->getAgent->firstname }}
                                    
                                </li>
                                <li>
                                    <i class="fa fa-skype user-profile-icon"></i> <strong>Skype :</strong> {{ $student->skype }}
                                    
                                </li>
                                <li>
                                    <i class="fa fa-phone user-profile-icon"></i> <strong>QQ :</strong> {{ $student->qq }}
                                    
                                </li>
                            </li>
                            <hr>
                            <h4>Classes</h4>
                            <ul class="list-unstyled user_data">
                                <li>
                                    <i class="fa fa-calendar user-profile-icon"></i> <strong>Completed :</strong> {{ $student->getTotalCompletedClasses() }}
                                    
                                </li>
                                <li>
                                    <i class="fa fa-calendar user-profile-icon"></i> <strong>Available:</strong> {{ $student->available_class }}
                                    
                                </li>
                            </ul>
                            <hr>
                            <h4>Actions</h4>
                            <ul class="list-unstyled user_data">
                                <li>
                                <a href="{{ url('admin/students/'.$student->id.'/book') }}" class="btn btn-success btn-xs"><i class="fa fa-calendar m-right-xs"></i> Book by Teacher</a>
                                </li>
                                <li>
                                <a href="{{ url('admin/students/'.$student->id.'/select_booking_date') }}" class="btn btn-success btn-xs"><i class="fa fa-calendar m-right-xs"></i> Book by Date</a>
                                </li>
                                
                                </li>
                                <li>
                                <a class="btn btn-success btn-xs" data-toggle="modal" data-target="#Update-available-class"><i class="fa fa-edit m-right-xs"></i> Update Available Class</a>
                                </li>
                                <li>
                                <a class="btn btn-default btn-xs" href="{{ url('admin/students/'. $student->id. '/edit' ) }}"><i class="fa fa-edit user-profile-icon"></i>  Edit Student</a>
                                <br/>
                                </li>
                                <li>
                                {!! Form::open(array('action'=>['Admin\AdminStudentController@destroy', $student->id ], 'method' => 'DELETE', 'class' => 'delete-form-student')) !!}
                                <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-close user-profile-icon"></i> Delete Student</button>
                                {!! Form::close() !!}
                                </li>
                            </ul>
                            

                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-12">

                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">All Classes</a>
                                    </li>
                                   
                                    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Completed Classes</a>
                                    </li>

                                    <li role="presentation" class=""><a href="#tab_content3" role="tab" id="progress-report-tab1" data-toggle="tab" aria-expanded="false">Progress Reports</a>
                                    </li>
                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="profile-tab">
                                        <table class="table ">
                                            <thead>
                                                <tr class="headings">
                                                   
                                                    <th class="column-title">Time</th> 
                                                    <th class="column-title">Tutor </th>
                                                    <th class="column-title">Type </th>
                                                    <th class="column-title">Status </th>
                                                    
                                                </tr>
                                            </thead>

                                            <tbody>
                                            @if(isset($classes))

                                            @foreach($classes as $class)
                                            <tr class="pointer">
                                                <td class=" "> {{ date("m/d/Y H:i a",strtotime($class->start)) }}</td>
                                                <td class=" "><a href="{{ url('/student/teachers/'. $class->getTeacher->id ) }}" >{{ $class->getTeacher->firstname }}</a></td>
                                                <td class=" ">{{ $class->type }}</td>

                                                <td class=" ">{{ $class->status }}</td>
                                                
                                                
                                            </tr>
                                            @endforeach
                                        @endif
                                        </tbody>

                                    </table>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="home-tab">
                                        <table class="table ">
                                            <thead>
                                                <tr class="headings">
                                                   
                                                    <th class="column-title">Time</th> 
                                                    <th class="column-title">Tutor </th>
                                                    <th class="column-title">Status </th>
                                                    <th class="column-title no-link last"><span class="nobr">Action</span>
                                                    </th>
                                                    <th class="bulk-actions" colspan="7">
                                                      
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                            @if(isset($completed_classes))

                                            @foreach($completed_classes as $class)
                                            <tr class="pointer">
                                                <td class=" "> {{ date("m/d/Y H:i a",strtotime($class->start)) }}</td>
                                                <td class=" "><a href="{{ url('/student/teachers/'. $class->getTeacher->id ) }}" >{{ $class->getTeacher->firstname }}</a></td>
                                                <td class=" ">{{ $class->status }}</td>
                                                <td class=" ">
                                                    @if($class->status == "COMPLETED" )
                                                    <a  class="btn-view-evaluation btn btn-success btn-xs" class-id="{{$class->id}}"><i class="fa fa-eye"></i> Evaluation</a>
                                                    @endif


                                                    @if(Date("Y-m-d H:i", strtotime( $class->start )) > Date("Y-m-d H:i:s", strtotime($current_time)) )
                                                    {!! Form::open(['url' => '/student/classes/'.$class->id, 'method' => 'DELETE']) !!}
                                                    {!! Form::submit('Cancel', ['class' => 'btn btn-danger btn-xs' ]) !!}
                                                    {!! Form::close() !!}
                                                    <!-- <a href="{{ url('student/classes/'.$class->id )}}" class="btn btn-danger btn-xs" class-id="{{$class->id}}"><i class="fa fa-close"></i> Cancel</a> -->
                                                    @endif
                                                </td>
                                                
                                            </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                    </div>

                                    <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="home-tab">
                                        <h5>Progress Reports</h5>
                                        <!-- start user projects -->
                                        <table class="data table table-striped no-margin">
                                            <thead>
                                                <tr>
                                                    <th>Teacher</th>
                                                    <th>Date</th>
                                                    <th>Select</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach($courses_with_pr as $course)
                                                <tr>
                                                    
                                                    <td class=" ">{{ $course->getTeacher()? $course->getTeacher()->firstname : 'no teacher' }}</td>
                                                    <td class=" ">{{ date("m/d/Y", strtotime($course->updated_at)) }}</td>
                                                    <td class=" "><a target="_blank" href="{{ url('admin/students/'.$course->student_id.'/progress_report/'.$course->id) }}" class="btn btn-xs btn-success">View</a></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>                      
                                    </div>
                                 
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div id="CalenderModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel2">Edit Calender Entry</h4>
                </div>
                <div class="modal-body">

                    <div id="testmodal2" style="padding: 5px 20px;">
                        <form id="antoform2" class="form-horizontal calender" role="form">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Title</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="title2" name="title2">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Description</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" style="height:55px;" id="descr2" name="descr"></textarea>
                                </div>
                            </div>

                        </form>x
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default antoclose2" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary antosubmit2">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>
    <div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div>

    <!-- End Calender modal -->



    <!-- Start Available Classes modal -->
    <div id="Update-available-class" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Available Classes</h4>
                </div>
                <div class="modal-body">
                    <div id="testmodal" style="padding: 5px 20px;">

                        {!! Form::open(array('url' => 'admin/students/'.$student->id.'/available_class', 'id' => 'available-class-form', 'class' => 'form-horizontal calender', 'role'=> 'form', 'method' => 'POST' ))!!}
                            <input type="hidden" id="student_id" name="student_id" value="{{ $student->id }}">
                            <input type="hidden" id="class_start" name="class_start" value="">
                            <input type="hidden" id="class_end" name="class_end" value="">

                            <p>This is the number of available classes can be book by a student.</p>
                            <div class="form-group">
                                <label class="col-sm-5 control-label">Number of Available Class</label>
                                <div class="col-sm-7">
                                <input type="number" class="form-control" name="available_class" value="{{ $student->available_class }}" required="">
                                </div>
                            </div>
                            
                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary antosubmit" onclick="$('#available-class-form').submit()">Save</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Start Class Evaluation modal -->
    <div id="UpdateEvaluation" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Class Evaluation</h4>
                </div>
                <div class="modal-body">
                    <div id="testmodal" style="padding: 5px 20px;">
                        {{ Form::open(array( 'url' => 'admin/classes', 'id'=>'evaluation-form', 'class'=>'form-horizontal calender', 'role'=>'form' ,'method' => 'POST')) }}
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Date</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="date" name="date" readonly="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Attendance</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="attendance" name="attendance" readonly="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Curriculum / Subject</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="subject" name="subject" readonly="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Topic / Page</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="topic" name="topic" readonly="">
                                </div>
                            </div>
                            
                                
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Comment</label>
                                <div class="col-sm-9">
                                    <textarea name="comment" id="comment" class="form-control" readonly=""></textarea>
                                </div>
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>
                    <!-- <a id="print-url" class="btn btn-info" target="_blank">Print</a> -->

                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('.btn-view-evaluation').click(function(){
            var class_id = $(this).attr('class-id');
            var url = $('#evaluation-form').attr('action');
            $('#UpdateEvaluation').modal('show');
            $('#evaluation-form').attr('action', url + '/' + class_id + '/evaluation');
            $.get(url + '/' + class_id + '/evaluation' )
            .done(function(response) {

                if (response.evaluation != null) {

                    $('input#date').val(response.evaluation.date);
                    $('input#attendance').val(response.evaluation.attendance);
                    $('input#subject').val(response.evaluation.subject);
                    $('input#topic').val(response.evaluation.topic);

                    $('textarea#comment').val(response.evaluation.comment);

                    $('a#print-url').attr('href', url + '/' + class_id + '/evaluation/print');

                }

            })
            .fail(function(response) {

            });
        });
        $(".cancel-form-class").on("submit", function(){
            return confirm("Do you want to Cancel this Class?");
        });

    </script>

    <!-- image cropping -->
    <script src="{{ url('/admin') }}/js/cropping/cropper.min.js"></script>
    <script src="{{ url('/admin') }}/js/cropping/main.js"></script>
@endsection
