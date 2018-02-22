@extends('layouts.teacher.app')

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

                        <div class="col-md-3 col-sm-3 col-xs-12 profile_left">

                            <div class="profile_img">

                                <!-- end of image cropping -->
                                <div id="crop-avatar">
                                    <!-- Current avatar -->
                                    <div class="avatar-view" title="Change the avatar">
                                        <img src="{{url($student->user->user_image)}}" alt="Avatar">
                                    </div>

                                    <!-- Loading state -->
                                    <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
                                </div>
                                <!-- end of image cropping -->

                            </div>
                            <h3>{{ $student->lastname }}, {{ $student->firstname }}</h3>

                            <ul class="list-unstyled user_data">
                                <li><i class="fa fa-user user-profile-icon"></i> <strong>Birth Date :</strong> {{ date("M j, Y", strtotime($student->dob)) }}
                                </li>
                                <li><i class="fa fa-user user-profile-icon"></i> <strong>Age :</strong> {{ date_diff(date_create($student->dob), date_create('now'))->y }} years old
                                <li>
                                    <i class="fa fa-user user-profile-icon"></i> <strong>Gender :</strong> {{ $student->gender }}
                                </li>
                                <li>
                                    <i class="fa fa-user user-profile-icon"></i> <strong>Agent :</strong> {{ $student->getAgent->lastname }} {{ $student->getAgent->firstname }}
                                    
                                </li>
                                <li>
                                    <i class="fa fa-skype user-profile-icon"></i> <strong>Skype :</strong> {{ $student->skype }}
                                    
                                </i>
                                </li>
                            </ul>
                            <hr>
                            <h4>Completed Classes with You</h4>
                            <ul class="list-unstyled user_data">

                                <li>
                                    <i class="fa fa-calendar user-profile-icon"></i> <strong>Regular:</strong> {{ $student->getCompletedClassesWithId($teacher->id) }}
                                    
                                </li>
                                
                            </ul>
                            <br/>
                            
                        
                            

                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-12">
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
                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">All Classes</a>
                                    </li>
                                   
                                    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Completed Classes</a>
                                    </li>
                                    @if(($student->progress_report) || ($student->getCompletedClassesWithId($teacher->id) >= 10 ))
                                    
                                    <li role="presentation" class=""><a href="#progress-report" role="tab" id="progress-report-tab" data-toggle="tab" aria-expanded="false">Progress Report</a>
                                    </li>
                                    @endif
                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="profile-tab">
                                        <table class="table ">
                                            <thead>
                                                <tr class="headings">
                                                   
                                                    <th class="column-title">Time</th> 
                                                    <th class="column-title">Tutor </th>
                                                    <th class="column-title">Status </th>
                                                    
                                                </tr>
                                            </thead>

                                            <tbody>
                                            @if(isset($classes))

                                            @foreach($classes as $class)
                                            <tr class="pointer">
                                                <td class=" "> {{ date("m/d/Y H:i a",strtotime($class->start)) }}</td>
                                                <td class=" ">{{ $class->getTeacher->lastname }} {{ $class->getTeacher->firstname }}</td>
                                                <td class=" ">
                                                    @if(( date( $class->end ."+1 day") < date( $current_time ) ) && ($class->status != "COMPLETED"))
                                                        <span style="color: red;">{{ "NO EVALUATION" }}</span>
                                                    @else    
                                                        {{ $class->status }}
                                                    @endif
                                                </td>
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
                                                <td class=" ">{{ $class->getTeacher->lastname }} {{ $class->getTeacher->firstname }}</td>
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
                                    @if(($student->progress_report) || ($student->getCompletedClassesWithId($teacher->id) >= 10 ))

                                    <div role="tabpanel" class="tab-pane fade in" id="progress-report" aria-labelledby="profile-tab">
                                        
                                        <!-- -->
                                        {!! Form::open(array('url' => 'teacher/student/'.$student->id.'/progress-report', 'id' => 'progress-report-form', 'method' => 'POST')) !!}
                                        <table class="table progress-report">
                                            <tbody>
                                                <tr>
                                                    <th>Student</th>
                                                    <th>Age</th>
                                                    <th>Teacher</th>
                                                    <th>Score</th>
                                                    <th>Level</th>
                                                    <th colspan="2">Test</th>
                                                </tr>
                                                <tr>
                                                    <td>{{ $student->firstname }}</td>
                                                    <td>{{ date_diff(date_create($student->dob), date_create('now'))->y }}</td>
                                                    <td>{{ $teacher->firstname }}</td>
                                                    <td><input type="text" name="score" value="{{ isset($student->progress_report->score)? $student->progress_report->score : ''}}"></td>
                                                    <td><input type="text" name="level" value="{{ isset($student->progress_report->level)? $student->progress_report->level : ''}}"></td>
                                                    <td colspan="2"><input type="text" name="test" value="{{ isset($student->progress_report->test)? $student->progress_report->test : '' }}"></td>
                                                </tr>
                                                <tr><td colspan="7"></td></tr>

                                                <tr>
                                                    <th>Score</th>
                                                    <th>Speaking</th>
                                                    <th>Pronunciation</th>
                                                    <th>Comprehension</th>
                                                    <th>Grammar</th>
                                                    <th>Vocabulary</th>
                                                    <th>Total Score</th>
                                                </tr>
                                                <tr>
                                                    <th>Perfect</th>
                                                    <td>30</td>
                                                    <td>10</td>
                                                    <td>20</td>
                                                    <td>20</td>
                                                    <td>20</td>
                                                    <th>100</th>

                                                </tr>
                                                <tr>
                                                    <td>Student</td>
                                                    <td><input type="text" name="student_score_speaking" value="{{ isset($student->progress_report->student_score_speaking)? $student->progress_report->student_score_speaking : '' }}"></td>
                                                    <td><input type="text" name="student_score_pronunciation" value="{{ isset($student->progress_report->student_score_pronunciation)? $student->progress_report->student_score_pronunciation: '' }}"></td>
                                                    <td><input type="text" name="student_score_comprehension" value="{{ isset($student->progress_report->student_score_comprehension)? $student->progress_report->student_score_comprehension: '' }}"></td>
                                                    <td><input type="text" name="student_score_grammar" value="{{ isset($student->progress_report->student_score_grammar)? $student->progress_report->student_score_grammar : '' }}"></td>
                                                    <td><input type="text" name="student_score_vocabulary" value="{{ isset($student->progress_report->student_score_vocabulary)? $student->progress_report->student_score_vocabulary : '' }}"></td>
                                                    <td><input type="text" name="student_score_total_score" value="{{ isset($student->progress_report->student_score_total_score)? $student->progress_report->student_score_total_score : '' }}"></td>

                                                </tr>

                                            </tbody>
                                        </table>

                                        <table class="table progress-report">
                                            <tbody>
                                                <tr >
                                                    <th>Level</th>
                                                    <td>1 ( 10~20 )</td>
                                                    <td>2 ( 21~45 )</td>
                                                    <td>3 ( 46~55 )</td>
                                                    <td>4 ( 56~65 )</td>
                                                    <td>5 ( 66~75 )</td>
                                                    <td>6 ( 76~85 )</td>
                                                    <td>7 ( 86~100 )</td>

                                                </tr>

                                                <tr>
                                                    <th>Guide</th>
                                                    <td>Basic</td>
                                                    <td>Low</td>
                                                    <td>Low Intermediate</td>
                                                    <td>Intermediate</td>
                                                    <td>High Intermediate</td>
                                                    <td>Advance</td>
                                                    <td>High Advance</td>
                                                </tr>
                                           
                                            </tbody>
                                        </table>

                                        <table class="table progress-report">
                                            <tbody>
                                                <tr>
                                                    <th>List</th>
                                                    <th colspan="3">Test Area</th>
                                                    <th width="50%">Comment</th>
                                                </tr>
                                                <tr><td colspan="6"></td></tr>

                                                <tr>
                                                    <th colspan="2">Speaking</th>
                                                    <th width="10%">Score</th>
                                                    <th width="10%">Total</th>
                                                    <th>Speaking Comment</th>
                                                    
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Speaking</td>
                                                    <td><input type="text" name="speaking_score" value="{{ isset($student->progress_report->speaking_score)? $student->progress_report->speaking_score : '' }}"></td>
                                                    <td><input type="text" name="speaking_total" value="{{ isset($student->progress_report->speaking_total)? $student->progress_report->speaking_total : '' }}"></td>
                                                    <td><input type="text" name="speaking_comment" value="{{ isset($student->progress_report->speaking_comment)? $student->progress_report->speaking_comment : '' }}"></td>
                                                </tr>

                                                <tr>
                                                    <th colspan="2">Pronunciation</th>
                                                    <th>Score</th>
                                                    <th>Total</th>
                                                    <th>Pronunciation Comment</th>
                                                    
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Pronunciation</td>
                                                    <td><input type="text" name="pronunciation_score" value="{{ isset($student->progress_report->pronunciation_score)? $student->progress_report->pronunciation_score : '' }}"></td>
                                                    <td><input type="text" name="pronunciation_total" value="{{ isset($student->progress_report->pronunciation_total)? $student->progress_report->pronunciation_total : '' }}"></td>
                                                    <td><input type="text" name="pronunciation_comment" value="{{ isset($student->progress_report->pronunciation_comment)? $student->progress_report->pronunciation_comment : '' }}"></td>
                                                </tr>
                                                <tr>
                                                    <th colspan="2">Comprehension</th>
                                                    <th>Score</th>
                                                    <th>Total</th>
                                                    <th>Comprehension Comment</th>
                                                    
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Comprehension</td>
                                                    <td><input type="text" name="comprehension_score" value="{{ isset($student->progress_report->comprehension_score)? $student->progress_report->comprehension_score : '' }}"></td>
                                                    <td><input type="text" name="comprehension_total" value="{{ isset($student->progress_report->comprehension_total)? $student->progress_report->comprehension_total : '' }}"></td>
                                                    <td><input type="text" name="comprehension_comment" value="{{ isset($student->progress_report->comprehension_comment)? $student->progress_report->comprehension_comment : '' }}"></td>
                                                </tr>
                                                <tr>
                                                    <th colspan="2">Grammar</th>
                                                    <th>Score</th>
                                                    <th>Total</th>
                                                    <th>Grammar Comment</th>
                                                    
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>Preciseness</td>
                                                    <td><input type="text" name="preciseness_score" value="{{ isset($student->progress_report->preciseness_score)? $student->progress_report->preciseness_score : '' }}"></td>
                                                    <td rowspan="2"><input type="text" name="grammar_total" value="{{ isset($student->progress_report->grammar_total)? $student->progress_report->grammar_total : '' }}"></td>
                                                    <td rowspan="2"><input type="text" name="grammar_comment" value="{{ isset($student->progress_report->grammar_comment)? $student->progress_report->grammar_comment : '' }}"></td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td>Sentence Constructions</td>
                                                    <td><input type="text" name="sentence_construction_score" value="{{ isset($student->progress_report->sentence_construction_score)? $student->progress_report->sentence_construction_score : '' }}"></td>
                                                </tr>
                                                <tr>
                                                    <th colspan="2">Vocabulary</th>
                                                    <th>Score</th>
                                                    <th>Total</th>
                                                    <th>Vocabulary Comment</th>
                                                    
                                                </tr>
                                                <tr>
                                                    <td>6</td>
                                                    <td>Appropriateness</td>
                                                    <td><input type="text" name="appropriateness_score" value="{{ isset($student->progress_report->appropriateness_score)? $student->progress_report->appropriateness_score : '' }}"></td>
                                                    <td rowspan="2"><input type="text" name="vocabulary_total" value="{{ isset($student->progress_report->vocabulary_total)? $student->progress_report->vocabulary_total : '' }}"></td>
                                                    <td rowspan="2"><input type="text" name="vocabulary_comment" value="{{ isset($student->progress_report->vocabulary_comment)? $student->progress_report->vocabulary_comment : '' }}"></td>
                                                </tr>
                                                <tr>
                                                    <td>7</td>
                                                    <td>Variety</td>
                                                    <td><input type="text" name="variety_score" value="{{ isset($student->progress_report->variety_score)? $student->progress_report->variety_score : '' }}"></td>
                                                </tr>
                                                <tr><td colspan="6"></td></tr>
                                                <tr><td colspan="6">
                                                    Teacher Comment
                                                    <textarea name="teacher_comment">{{ isset($student->progress_report->teacher_comment)? $student->progress_report->teacher_comment : '' }}</textarea>
                                                </td></tr>

                                          
                                            </tbody>
                                        </table>
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <button type="submit" class="btn btn-success">Save Progress Report</button>
                                            </div>
                                        </div>
                                        {!! Form::close() !!}
                                        <!-- -->
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
        
    <!-- Start Calender modal -->
    <div id="CalenderModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Select Tutor</h4>
                </div>
                <div class="modal-body">
                    <div id="testmodal" style="padding: 5px 20px;">

                        {!! Form::open(array('action' => 'Admin\AdminClassController@store', 'id' => 'class-form', 'class' => 'form-horizontal calender', 'role'=> 'form' ))!!}
                            <input type="hidden" id="student_id" name="student_id" value="{{ $student->id }}">
                            <input type="hidden" id="class_start" name="class_start" value="">
                            <input type="hidden" id="class_end" name="class_end" value="">

                            
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Tutor Available</label>
                                <div class="col-sm-9">
                                <select name="tutor" id="tutor" class="form-control">
                                    @if(isset($teachers))
                                    @foreach($teachers as $teacher)
                                    <option value="{{ $teacher->id }}"> {{ $teacher->lastname }}, {{ $teacher->firstname }}</option>
                                    @endforeach
                                    @endif
                                </select>
                                </div>
                            </div>
                            
                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary antosubmit">Book</button>
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



    <!-- Start Calender modal -->
    <div id="Update-available-class" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Available Classes</h4>
                </div>
                <div class="modal-body">
                    <div id="testmodal" style="padding: 5px 20px;">

                        {!! Form::open(array('url' => 'admin/student/'.$student->id.'/available_class', 'id' => 'available-class-form', 'class' => 'form-horizontal calender', 'role'=> 'form', 'method' => 'POST' ))!!}
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
@endsection
