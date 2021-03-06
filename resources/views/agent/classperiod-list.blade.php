@extends('layouts.agent.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Classes <small></small></h2>
                        
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
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <table class="table list-table table-striped responsive-utilities jambo_table bulk_action">
                            <thead>
                                <tr class="headings">
                                    <th>
                                        <input type="checkbox" id="check-all" class="flat">
                                    </th>
                                    <th class="column-title">Time </th>
                                    <th class="column-title">Student </th>
                                    <th class="column-title">Teacher </th>
                                    <th class="column-title">Status </th>
                                    <th class="column-title">Type </th>
                                    <th class="column-title">Action </th>
                                    
                                </tr>
                            </thead>

                            <tbody>
                            @if(isset($classes))

                                @foreach($classes as $class)
                                <tr class="even pointer">
                                    <td class="a-center "><input type="checkbox" class="flat" name="table_records" ></td>
                                    <td class="date-cell" date-value="{{ date("m/d/Y",strtotime($class->start)) }}"> {{ date("m/d/Y H:i a",strtotime($class->start)) }}</td>
                                    <td class=" "><a href="{{ url('agent/students/'.$class->getStudent['id']) }}">{{ $class->getStudent['firstname'] }} {{ $class->getStudent['lastname'] }}</a>  </td>
                                    <td class=" "><a href="{{ url('agent/teachers/'.$class->getTeacher['id']) }}">Teacher {{ $class->getTeacher['firstname'] }}</a></td>                                    
                                    
                                    <td class=" ">
                                        @if(( date( $class->end ."+1 day") < date( $current_time ) ) && ($class->status != "COMPLETED"))
                                            {{ "NO EVALUATION" }}
                                        @else    
                                            {{ $class->status }}
                                        @endif
                                    </td>
                                    <td class=" ">{{ $class->type }}</td>                                    

                                    <td class="">
                                    @if(($class->status == 'BOOKED') && ( date( "Y-m-d H:i", strtotime($class->start) ) > date( "Y-m-d H:i", strtotime($current_time. "+2 hours") ) ))
                                    {!! Form::open(array( 'url' => 'agent/classes/'.$class->id.'/cancel', 'method'=> 'POST', 'class' => 'cancel-form-class',
                                    'style'=> 'display: inline;')) !!}
                                        <button class="btn btn-warning btn-xs"><i class="fa fa-close"></i> Cancel</button>
                                    {!! Form::close() !!}
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
                        {{ Form::open(array( 'url' => 'admin/class/evaluate', 'id'=>'evaluation-form', 'class'=>'form-horizontal calender', 'role'=>'form' ,'method' => 'POST')) }}
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Date</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="date" name="date" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Attendance</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="attendance" name="attendance" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Curriculum / Subject</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="subject" name="subject" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Topic / Page</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="topic" name="topic" required="">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Comment</label>
                                <div class="col-sm-9">
                                    <textarea name="comment" id="comment" class="form-control" required=""></textarea>
                                </div>
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="$('#evaluation-form').submit();">Save Evaulation</button>
                </div>
            </div>
        </div>
    </div>
    
    <script type="text/javascript">
        $('.btn-view-evaluation').click(function(){
            var class_id = $(this).attr('class-id');
            var date_value = $(this).attr('date-value');
            
            $('#evaluation-form .form-control').val(null);

            $('input#date').val(date_value);

            // var url = $('#evaluation-form').attr('action');
            var url = "{{ url('/admin/class') }}";
            $('#UpdateEvaluation').modal('show');
            $('#evaluation-form').attr('action', url + '/' + class_id + '/evaluation');
            $.get(url + '/' + class_id + '/evaluation' )
            .done(function(response) {

                if (response.evaluation != null) {

                    $('input#date').val(response.evaluation.date);
                    $('input#attendance').val(response.evaluation.attendance);
                    $('input#subject').val(response.evaluation.subject);
                    $('input#topic').val(response.evaluation.topic);

                    if(response.evaluation.scores){
                        response.evaluation.scores.forEach(function(score){
                            // $('input.scores').val(response.evaluation.scores);
                            $('input#' + score).iCheck('check');
                            // console.log(score);
                        });
                    }
                    $('textarea#comment').val(response.evaluation.comment);

                }

                console.log(response);
            })
            .fail(function(response) {
                console.log(response);
            });
        });
    </script>
@endsection
