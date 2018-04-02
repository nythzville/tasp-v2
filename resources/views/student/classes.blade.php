@extends('layouts.student.app')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
    @if($page == 'CLASSES_TODAY')
    <div class="page-title">
        <div class="title_left">
            <h3>My Class Today</h3>
            <p>{{ date('F j, Y | l') }}</p>
        </div>

        <div class="title_right">
            
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    @if($page == 'CLASSES_TODAY')
                    <h2>Classes Today<small> </small></h2>
                    
                    @elseif($page == 'UPCOMING_CLASSES')
                    <h2>Upcoming Classes<small> </small></h2>

                    @elseif($page == 'COMPLETED_CLASSES')
                    <h2>Completed Classes<small> </small></h2>

                    @elseif($page == 'BOOKED_CLASSES')
                    <h2>Booked Classes<small> </small></h2>

                    @else
                    <h2>Class List<small>All My Classes </small></h2>
                    @endif

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
                    <table class="table list-table table-striped responsive-utilities jambo_table bulk_action">
                        <thead>
                            <tr class="headings">
                                <th>
                                    <input type="checkbox" id="check-all" class="flat">
                                </th>
                                <th class="column-title">Time</th> 
                                <th class="column-title">Tutor </th>
                                <th class="column-title">Skype ID</th>
                                <th class="column-title">QQ ID</th>
                                <th class="column-title">Type </th>
                                <th class="column-title no-link last"><span class="nobr">Action</span>
                                </th>
                                <th class="bulk-actions" colspan="7">
                                  
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                        @if(isset($classes))

                        @foreach($classes as $class)
                        <tr class="pointer">

                            <td class="a-center "><input type="checkbox" class="flat" name="table_records" ></td>
                            <td class=" "> {{ date("m/d/Y g:i a",strtotime($class->start)) }}</td>
                            <td class=" "><a href="{{ url('/student/teachers/'. $class->getTeacher->id ) }}" >Teacher {{ $class->getTeacher->firstname }}</a></td>
                            <td class=" "> {{ $class->getTeacher->skype }}</i></td>
                            <td class=" "> {{ $class->getTeacher->qq }}</td>
                            <!-- <td class=" ">{{ $class->status }}</td> -->
                            <td class=" ">{{ $class->type }}</td>

                            <td class=" ">
                                @if($class->status == "COMPLETED" )
                                <a  class="btn-view-evaluation btn btn-success btn-xs" class-id="{{$class->id}}"><i class="fa fa-eye"></i> Evaluation</a>
                                @endif


                                @if( Date("Y-m-d H:i", strtotime( $class->start ) ) > Date("Y-m-d H:i", strtotime($current_time." +2 hours") ) && ($class->status != "CANCELLED"))
                                {!! Form::open(['url' => '/student/classes/'.$class->id, 'method' => 'DELETE', 'class' => 'cancel-form-class']) !!}

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
        </div>
    </div>
</div>
    <!-- Start Calender modal -->
    <div id="UpdateEvaluation" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Class Evaluation</h4>
                </div>
                <div class="modal-body">
                    <div id="testmodal" style="padding: 5px 20px;">
                        {{ Form::open(array( 'url' => 'student/classes', 'id'=>'evaluation-form', 'class'=>'form-horizontal calender', 'role'=>'form' ,'method' => 'POST')) }}
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
                    <a id="print-url" class="btn btn-info" target="_blank">Print</a>

                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('.btn-view-evaluation').click(function(){
            var class_id = $(this).attr('class-id');
            var url = $('#evaluation-form').attr('action');
            $('#UpdateEvaluation').modal('show');
            // $('#evaluation-form').attr('action', url + '/' + class_id + '/evaluation');
            $.get(url + '/' + class_id + '/evaluation' )
            .done(function(response) {

                if (response.evaluation != null) {

                    $('input#date').val(response.evaluation.date);
                    $('input#attendance').val(response.evaluation.attendance);
                    $('input#subject').val(response.evaluation.subject);
                    $('input#topic').val(response.evaluation.topic);

                    // if(response.evaluation.scores){
                    //     response.evaluation.scores.forEach(function(score){
                    //         // $('input.scores').val(response.evaluation.scores);
                    //         $('input#' + score).iCheck('check');
                    //         // console.log(score);
                    //     });
                    // }
                    $('textarea#comment').val(response.evaluation.comment);

                    $('a#print-url').attr('href', url + '/' + class_id + '/evaluation/print');

                }

                console.log(response);
            })
            .fail(function(response) {
                console.log(response);
            });
        });
        $(".cancel-form-class").on("submit", function(){
            return confirm("Do you want to Cancel this Class?");
        });

    </script>
        
@endsection
