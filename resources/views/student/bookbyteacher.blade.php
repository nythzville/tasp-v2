@extends('layouts.student.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Book a Class</h3>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>{{ $teacher->lastname }} {{ $teacher->firstname }}<small>teacher to be book</small></h2>
                        
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table class="table table-bordered">
                            <thead>
                                <th class="time">Time</th>
                                @foreach($teachers as $teacher)
                                    <th id="{{ $teacher->id }}"> {{ $teacher->lastname }} {{ $teacher->firstname }}</th>
                                @endforeach
                            </thead>
                            <tbody>
                                @for($time = strtotime('00:00'); $time <= strtotime('23:59'); $time = $time +(60*30))
                                
                                <?php $status = "<td class='closed'>CLOSED</td>"; ?>

                                <tr>

                                <th>{{ date('H:i a', $time ) }}</th>
                                    <?php
                                    foreach($teachers as $teacher){
                                        foreach($teachers_scheds as $sched){

                                            if(date('H:i a', $time ) >= date('H:i a', strtotime($sched->start) ) 
                                               && date('H:i a', $time ) <= date('H:i a', strtotime($sched->end) )
                                                ){

                                                if( $teacher->id == $sched->teacher_id ){

                                                    $booked = false;
                                                    foreach ($classPeriods as $classPeriod) {
                                                        if ( date('H:i a', $time ) == date('H:i a', strtotime($classPeriod->start))
                                                            // && date('H:i a', $time ) <= date('H:i a', strtotime($classPeriod->end) )
                                                            && ($classPeriod->teacher ==  $sched->teacher_id)
                                                        ) {

                                                            $booked = true;
                                                            break;
                                                        }
                                                    }

                                                    if( $booked == true){
                                                        $status = "<td date='".$date."' from='".date('H:i', $time )."' to='".date('H:i', $time + (60 * 30 ))."' teacher-id='".$teacher->id."' class='booked'>BOOKED</td>";

                                                    }else{
                                                        $status = "<td date='".$date."' from='".date('H:i', $time )."' to='".date('H:i', $time + (60 * 30 ))."' teacher-id='".$teacher->id."' class='open'>BOOK NOW</td>";
                                                    }
                                                    // break;
                                                }else{
                                                    $status = "<td class='closed'>CLOSED</td>";

                                                }
                                            }
                                        }
                                        echo $status;
                                        ?>
                                      
                                <?php  }   
                                ?>
                                    
                                </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Calender modal -->
        <div id="BookingModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel">Book A Class </h4>
                    </div>
                    <div class="modal-body">
                        <div id="testmodal" style="padding: 5px 20px;">
                            <!-- <form id="booking-form" class="form-horizontal calender" role="form"> -->
                                {{ Form::open(array('action' => 'Student\StudentClassController@store', 
                                'id' => 'booking-form', 'class' => 'form-horizontal calendar', 'role' => 'form')) }}
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Tutor</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="tutor" name="tutor" readonly="">
                                        <input type="hidden" class="form-control" id="tutor_id" name="tutor_id">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Date</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="schedule-date" name="schedule-date" readonly="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Time</label>
                                    <div class="col-sm-4">
                                        <input type="time" class="form-control" id="from-time" name="from-time" readonly="">
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="time" class="form-control" id="to-time" name="to-time" readonly="">
                                    </div>
                                </div>
                                {{ Form::close() }}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary antosubmit" onclick="$('#booking-form').submit();">Book</button>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $('td.open').click(function(){
                var teacher_id = $(this).attr('teacher-id');
                var date = $(this).attr('date');
                var from = $(this).attr('from');
                var to = $(this).attr('to');


                $('#tutor').val( $("#"+teacher_id).html() );
                $('#tutor_id').val(teacher_id);
                $('#schedule-date').val(date);
                $('#from-time').attr('value',from);
                $('#to-time').attr('value',to);

                $('#BookingModal').modal('show');
            });
        </script>

@endsection
