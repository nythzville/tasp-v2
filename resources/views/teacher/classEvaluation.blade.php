@extends('layouts.teacher.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Class Evaluation <small></small></h2>
                        
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        {{ Form::open(array( 'url' => 'teacher/classes/'.$class->id, 'id'=>'antoform', 'class'=>'form-horizontal calender', 'role'=>'form' ,'method' => 'PUT')) }}
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Date</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="schedule-date" name="schedule-date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Attendance</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="attendance" name="attendance">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Curriculum / Subject</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="subject" name="subject">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Topic / Page</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="topic" name="topic">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Score</label>
                                <div class="col-sm-9">

                                    <div class="col-sm-4">
                                        <p>
                                        <input type="checkbox" name="hobbies[]" id="hobby1" value="ski" data-parsley-mincheck="2" required="" class="flat" data-parsley-multiple="hobbies" data-parsley-id="9985">
                                        Confidence
                                        </p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p>
                                        <input type="checkbox" name="hobbies[]" id="hobby1" value="ski" data-parsley-mincheck="2" required="" class="flat" data-parsley-multiple="hobbies" data-parsley-id="9985">
                                        Vocabulary
                                        </p>    
                                    </div>
                                    <div class="col-sm-4">
                                        <p>
                                        <input type="checkbox" name="hobbies[]" id="hobby1" value="ski" data-parsley-mincheck="2" required="" class="flat" data-parsley-multiple="hobbies" data-parsley-id="9985">
                                        Listening
                                        </p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p>
                                        <input type="checkbox" name="hobbies[]" id="hobby1" value="ski" data-parsley-mincheck="2" required="" class="flat" data-parsley-multiple="hobbies" data-parsley-id="9985">
                                        Communication
                                        </p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p>
                                        <input type="checkbox" name="hobbies[]" id="hobby1" value="ski" data-parsley-mincheck="2" required="" class="flat" data-parsley-multiple="hobbies" data-parsley-id="9985">
                                        Grammar
                                        </p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p>
                                        <input type="checkbox" name="hobbies[]" id="hobby1" value="ski" data-parsley-mincheck="2" required="" class="flat" data-parsley-multiple="hobbies" data-parsley-id="9985">
                                            Reading And Comprehension
                                        </p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p>
                                        <input type="checkbox" name="hobbies[]" id="hobby1" value="ski" data-parsley-mincheck="2" required="" class="flat" data-parsley-multiple="hobbies" data-parsley-id="9985">
                                            Pronunciation
                                        </p>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Comment</label>
                                <div class="col-sm-9">
                                    <textarea name="comment" id="comment" class="form-control"></textarea>
                                </div>
                            </div>
                        {{ Form::close() }}

                    </div>

                </div>
            </div>
        </div>
    </div>
    
    
@endsection
