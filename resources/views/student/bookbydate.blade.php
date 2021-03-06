@extends('layouts.student.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Book a Class in <small> {{ $date }}</small></h2>
                        
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
                          <style type="text/css">
                              .fixedTable .table {
                                  background-color: white;
                                  width: auto;
                                }
                                .fixedTable .table tr td,
                                .fixedTable .table tr th {
                                  min-width: 167px;
                                  width: 167px;
                                  min-height: 20px;
                                  height: 20px;
                                  padding: 10px;
                                }
                                .fixedTable-header {
                                  width: 850px;
                                  height: 40px;
                                  margin-left: 110px;
                                  overflow: hidden;
                                  border-bottom: 1px solid #CCC;
                                }
                                .fixedTable-sidebar {
                                  width: 110px;
                                  height: 450px;
                                  float: left;
                                  overflow: hidden;
                                  border-right: 1px solid #CCC;
                                }
                                .fixedTable-body {
                                  overflow: auto;
                                  width: 850px;
                                  height: 450px;
                                  float: left;
                                }

                          </style>
                        <div class="book-date-table-container">
                            <div class="fixedTable" id="demo">
                                <header class="fixedTable-header">
                                <table class="table table-bordered">
                                  <thead>
                                    <tr>
                                        @foreach($teachers as $teacher)
                                            @if(count($teacher->hasSchedule($date) ) > 0 )
                                                <th width="300" id="{{ $teacher->id }}" width="300"> <a href="{{ url('student/teachers/'.$teacher->id ) }}">Teacher {{ $teacher->firstname }}</a>
                                                </th>
                                            @endif
                                        @endforeach
                                    </tr>
                                  </thead>
                                </table>
                              </header>
                              <!-- ASIDE -->
                              <aside class="fixedTable-sidebar">
                                <table class="table table-bordered">
                                  <tbody>
                                    @for($time = strtotime('05:00'); $time <= strtotime('23:59'); $time = $time +(60*30))
                                        <tr>
                                        <th class="time-head" width='300'>{{ date('H:i a', $time ) }}</th>
                                        </tr>
                                    @endfor
                                  </tbody>
                                </table>
                              </aside>
                              <!-- /ASIDE -->
                                <div class="fixedTable-body">
                                <table class="table table-bordered">
                                  <tbody>
                                    @for($time = strtotime('05:00'); $time <= strtotime('23:59'); $time = $time +(60*30))
                    
                                    <?php $status = "<td width='300' class='closed'>CLOSED</td>"; ?>

                                    <tr>
                                        <!-- <th class="time-head" width='300'>{{ date('H:i a', $time ) }}</th> -->

                                        <?php
                                        foreach($teachers as $teacher){
                                            $status = "<td width='300' class='closed'>CLOSED</td>";
                                            $this_teachers_scheds = $teacher->hasSchedule($date);
                                            if(count($this_teachers_scheds) > 0 ){
                                            
                                            foreach($this_teachers_scheds as $sched){

                                                // if( $teacher->id == $sched->teacher_id ){

                                                  $teachers_sched_start = date('H:i', strtotime($sched->start));
                                                  $teachers_sched_end = date('H:i', strtotime($sched->end)); 
                                                  $time_to_hours = date('H:i', $time ) ;
                                                  // echo "<!-- $teachers_sched_start  to $teachers_sched_end -->";
                                                  // echo "<!-- $time_to_hours -->";
                                                  // echo "<!-- date('H:i', $time ) -->";

                                                    if($time_to_hours >= $teachers_sched_start
                                                       && $time_to_hours < $teachers_sched_end
                                                        ){

                                                        $booked = false;
                                                        $owned = false;

                                                        foreach ($classPeriods as $classPeriod) {
                                                            if ( date('H:i', $time ) == date('H:i', strtotime($classPeriod->start))
                                                                // && date('H:i a', $time ) <= date('H:i a', strtotime($classPeriod->end) )
                                                                && ($classPeriod->teacher ==  $sched->teacher_id)
                                                            ) {

                                                                $booked = true;
                                                                if($classPeriod->student == $student->id){
                                                                  $owned = true;
                                                                  $bookby = $classPeriod->getAuthor;

                                                                }

                                                                break;
                                                            }
                                                        }

                                                        if( $booked == true){
                                                            $status = "<td width='300' date='".$date."' from='".date('H:i', $time )."' to='".date('H:i', $time + (60 * 30 ))."' teacher-id='".$teacher->id."'";

                                                            $status .= " class='booked ".($owned? 'owned': '')."'>";
                                                            $status .= "<span class='booked-text'>BOOKED with</span><br/>";
                                                            if ($owned) {
                                                              $status .= "YOU";
                                                            }else{
                                                              $status .= "Other student";
                                                            }
                                                            $status .= "</td>";

                                                        }else{
                                                            $status = "<td width='300' date='".$date."' from='".date('H:i', $time )."' to='".date('H:i', $time + (60 * 30 ))."' teacher-id='".$teacher->id."' class='open'>BOOK NOW </td>";
                                                        }
                                                        break;
                                                    }else{
                                                        $status = "<td width='300' class='closed'>CLOSED</td>";

                                                    }
                                                // }
                                            }
                                            echo $status;
                                            }
                                            
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
            // Disable same schedule
            $('td.owned').each(function(owned_index, owned_item){
              var from_base = $(owned_item).attr('from');
              var to_base = $(owned_item).attr('to');

              $('td.open').each(function(open_index, open_item){
                var from = $(open_item).attr('from');
                var to = $(open_item).attr('to');

                  console.log(from_base);
                  console.log(from);

                if (( from == from_base ) && (to == to_base)) {
                  $(open_item).addClass('disabled');
                  $(open_item).removeClass('open');
                  $(open_item).css('background-color','#212121');
                  $(open_item).css('opacity',1);
                  $(open_item).html('DISABLED');

                }
              });

            });


            var current_date = new Date('{{ $current_time }}');
            $('td.open').each(function(index, item){
                if($(item).hasClass('open')){
                    var cell_date_time = new Date($(item).attr('date')+" "+$(item).attr('from'));
                    
                    if (cell_date_time < current_date ) {
                        $(item).removeClass('open');    
                        $(item).addClass('closed');
                        $(item).html('PASSED');
                    }
                }
            });

            $('td.open').click(function(){
                var teacher_id = $(this).attr('teacher-id');
                var date = $(this).attr('date');
                var from = $(this).attr('from');
                var to = $(this).attr('to');


                $('#tutor').val( $("#"+teacher_id+ " a").html() );
                $('#tutor_id').val(teacher_id);
                $('#schedule-date').val(date);
                $('#from-time').attr('value',from);
                $('#to-time').attr('value',to);

                $('#BookingModal').modal('show');
            });

            $('.book-date-table-container').scroll(function(){
                $('#thead-header').css('position','absolute');
                $('#thead-header').css('top',$(this).offset().top);

            })

            const fixedTable = function(el) {
              const $body = $(el).find('.fixedTable-body');
              const $sidebar = $(el).find('.fixedTable-sidebar table');
              const $header = $(el).find('.fixedTable-header table');
              return $($body).scroll(function() {
                $($sidebar).css('margin-top', -$($body).scrollTop());
                return $($header).css('margin-left', -$($body).scrollLeft());
              });
            };

            const demo = new fixedTable($('#demo'));



        </script>

@endsection
