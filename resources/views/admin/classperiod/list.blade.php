@extends('layouts.admin.app')

@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="page-title">
                  <div class="title_left">
                    <h3>Classes List</h3>
                  </div>

                  <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        {!! Form::open(['url' => url()->current(), 'method' => 'GET' ]) !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="s" placeholder="Search for class..." value="{{ isset($s)? $s : '' }}">
                            <span class="input-group-btn">
                            <button type="submit" class="btn btn-default" type="button">Go!</button>
                            </span>
                        </div>
                        {!! Form::close() !!}
                    </div>
                  </div>
                </div>
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
                        <table class="table class-table table-striped responsive-utilities jambo_table bulk_action">
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
                                    <td class=" ">{{ $class->getStudent['firstname'] }} {{ $class->getStudent['lastname'] }}</td>
                                    <td class=" ">{{ $class->getTeacher['firstname'] }}</td>                                    
                                    
                                    <td class=" ">
                                        @if(( date( $class->end ."+1 day") < date( $current_time ) ) && ($class->status != "COMPLETED"))
                                            <span style="color: red;">{{ "NO EVALUATION" }}</span>
                                        @else    
                                            {{ $class->status }}
                                        @endif
                                    </td>
                                    <td class=" ">{{ $class->type }}</td>                                    
                                    <td class="">
                                        @if($class->type == "TRIAL")
                                        <a href="{{ url('admin/classes/'.$class->id.'/evaluate_trial') }}" class="btn btn-success btn-xs" > <i class="fa fa-eye" ></i>View Evaluation</button></a>

                                        @else
                                        @if($class->status == 'COMPLETED')
                                        
                                        <button class="btn-view-evaluation btn btn-success btn-xs" class-id="{{$class->id}}" date-value="{{ date("m/d/Y",strtotime($class->start)) }}"><i class="fa fa-eye" ></i>View Evaluation</button>
                                        @else
                                        
                                        <button class="btn-view-evaluation btn btn-primary btn-xs" class-id="{{$class->id}}" date-value="{{ date("m/d/Y",strtotime($class->start)) }}"><i class="fa fa-eye" ></i> Evaluate </button>
                                        @endif
                                        @endif

                                    @if(($class->status == 'BOOKED') && ( date( $class->end ) > date( $current_time ) ))
                                    {!! Form::open(array( 'url' => 'admin/classes/'.$class->id.'/cancel', 'method'=> 'POST', 'class' => 'cancel-form-class',
                                    'style'=> 'display: inline;')) !!}
                                        <button class="btn btn-warning btn-xs"><i class="fa fa-close"></i> Cancel</button>
                                    {!! Form::close() !!}

                                    @endif

                                    {!! Form::open(array( 'url' => 'admin/classes/'.$class->id, 'method'=> 'DELETE', 'class' => 'delete-form-class',
                                    'style'=> 'display: inline;')) !!}
                                    
                                        <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</button>

                                    {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                        <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_0_paginate">
                            @if($classes->currentPage()!= 1)
                            <a href="{{ url('/admin/classes?page=1' ) }}{{ isset($s)? '&s='.$s : '' }}" class="first paginate_button paginate_button_disabled" id="DataTables_Table_0_first">First</a>
                            <a href="{{ $classes->previousPageUrl() }}{{ isset($s)? '&s='.$s : '' }}" class="previous paginate_button paginate_button_disabled" id="DataTables_Table_0_previous">Previous</a>
                            @endif
                            <span>
                                @if($classes->lastPage() < 3)
                                @for($i = 1; $i <= $classes->lastPage(); $i++ )
                                <a href="{{ $classes->url( $i ) }}{{ isset($s)? '&s='.$s : '' }}" class="{{ ($i == $classes->currentPage())? 'paginate_active' : 'paginate_button'}}">{{ $i }}</a>
                                @endfor
                                
                                @else

                                    @if( $classes->currentPage() > ($classes->lastPage() - 2 ) )

                                        @for($i = ($classes->currentPage() - 1); $i <= $classes->lastPage(); $i++ )
                                            <a href="{{ $classes->url( $i ) }}{{ isset($s)? '&s='.$s : '' }}" class="{{ ($i == $classes->currentPage())? 'paginate_active' : 'paginate_button'}}">{{ $i }}</a>
                                        @endfor

                                    @elseif($classes->currentPage() > 3)

                                        @for($i = $classes->currentPage() - 1 ; $i <= ($classes->currentPage() + 1); $i++ )
                                            <a href="{{ $classes->url( $i ) }}{{ isset($s)? '&s='.$s : '' }}" class="{{ ($i == $classes->currentPage())? 'paginate_active' : 'paginate_button'}}">{{ $i }}</a>
                                        @endfor

                                    @else
                                        @for($i = 1; $i <= 4; $i++ )
                                            <a href="{{ $classes->url( $i ) }}{{ isset($s)? '&s='.$s : '' }}" class="{{ ($i == $classes->currentPage())? 'paginate_active' : 'paginate_button'}}">{{ $i }}</a>
                                        @endfor
                                    @endif
                                @endif
                            </span>
                            @if($classes->currentPage() < $classes->lastPage())
                            <a href="{{ $classes->nextPageUrl() }}{{ isset($s)? '&s='.$s : '' }}" class="next paginate_button" id="DataTables_Table_0_next">Next</a>
                            <a href="{{ url('/admin/classes?page='.$classes->lastPage() ) }}{{ isset($s)? '&s='.$s : '' }}" class="last paginate_button" id="DataTables_Table_0_last">Last</a>
                            @endif

                        </div>
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
                        {{ Form::open(array( 'url' => 'admin/classes/evaluate', 'id'=>'evaluation-form', 'class'=>'form-horizontal calender', 'role'=>'form' ,'method' => 'POST')) }}
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
        $(document).ready(function () {
                var oTable = $('.class-table').dataTable({
                    "oLanguage": {
                        "sSearch": "Search for class info:"
                    },

                    "dom"    : 'rt',
                    
                });
        });

        // Evaluation Button
        $('.btn-view-evaluation').click(function(){
            var class_id = $(this).attr('class-id');
            var date_value = $(this).attr('date-value');
            
            $('#evaluation-form .form-control').val(null);

            $('input#date').val(date_value);

            // var url = $('#evaluation-form').attr('action');
            var url = "{{ url('/admin/classes') }}";
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
