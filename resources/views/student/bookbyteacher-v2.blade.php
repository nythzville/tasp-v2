@extends('layouts.student.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Book A Class <span id="clock" class="small"></span></h3> 
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Teacher {{ $teacher->firstname }}'s<small> Schedule</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            @if(date("Y-m-d") < date("Y-m-d", strtotime($date)))
                            <li><a href="{{ url()->current() }}?week={{ ($week - 1 ) }}"><i class="fa fa-chevron-left"></i> Prev</a>
                            @endif

                            </li>
                            <li><a href="{{ url()->current() }}?week={{ ($week + 1) }}">Next <i class="fa fa-chevron-right"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <style type="text/css">
                      table.weekdays>tbody>tr>td.days{
                        padding-left: 0;
                        padding-right: 0;
                      }
                    </style>
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
                      <table class="table weekdays">
                        <!-- header -->
                        <thead>
                          <tr>
                            <td width="20%">Time</td>
                            
                            <?php
                            $today = date("Y-m-d", strtotime($date));
                            $next_week = date("Y-m-d",strtotime($today .'+6 day'));

                            $week_start = date('Y-m-d', strtotime('monday this week'));
                            $week_end = date('Y-m-d', strtotime('sunday this week'));

                            $d = $today;
                            while($d <= $next_week ){
                              
                              echo '<td>';
                              echo '<a  href="#">'.date("l",strtotime($d)).'<br/>'.date("m /d / Y",strtotime($d)).'</a>';
                              echo '</td>';
                              $d = date('Y-m-d', strtotime($d .'+1 day'));
                            }
                            ?>
                          </tr>
                        </thead>
                        <!-- / Header -->

                        <!-- Body -->
                        <tbody>
                          <tr>
                            <td>
                            <table class="table">
                                <tbody>
                                  @for($time = strtotime('05:00'); $time <= strtotime('23:00'); $time = $time +(60*30))
                                    <tr><td>{{ date('g:i a', $time ) }} - {{ date('g:i a', $time + (60*30) ) }}</td></tr>
                                  @endfor
                                </tbody>
                              </table>
                            </td>
                          <?php
                          $d = $today;
                          while($d <= $next_week ){
                          ?>
                          
                          <td id="day-{{ date('Y-m-d', strtotime($d) ) }}" class="days">
                            <!-- Content -->
                            <table class="table">
                              <tbody>
                              @for($time = strtotime('05:00'); $time <= strtotime('23:00'); $time = $time +(60*30))
                                
                                <?php
                                $passed = false;
                                if(date("Y-m-d", strtotime($d)) == date("Y-m-d")){
                                  if(date("H:i a") > date( "H:i a", $time )){
                                    $passed = true;
                                  }
                                }

                                /** Check if Schedule is open for the teacher **/
                                $sched_open = false;
                                foreach($teacher_scheds as $sched){
                                  if(date('H:i a', $time ) >= date('H:i a', strtotime($sched->start) ) 
                                     && date('Y-m-d', strtotime($d) ) == date('Y-m-d', strtotime($sched->start) )
                                     && date('H:i a', $time ) < date('H:i a', strtotime($sched->end) )
                                      ){

                                    $sched_open = true;
                                    break;
                                  }
                                }
                                /** Check if schedule is already booked for a class **/
                                $booked = false;
                                $owned = false;
                                $disabled = false;
                                $bookby = $student->getUser;

                                foreach ($classPeriods as $classPeriod) {
                                  if ( date('H:i a', $time ) == date('H:i a', strtotime($classPeriod->start))
                                      && date('Y-m-d', strtotime($d) ) == date('Y-m-d', strtotime($classPeriod->start) )
                                      // && ($classPeriod->teacher ==  $sched->teacher_id)
                                  ) {

                                      $booked = true;
                                      
                                      // If student of the class same as current student then make it owned
                                      if($classPeriod->student == $student->id){
                                        $owned = true;
                                        $bookby = $classPeriod->getAuthor;

                                      }

                                      break;
                                  }
                                }
                                //If third saturday of the month
                                if($d == $third_sat){
                                  $disabled = true;
                                }
                                ?>
                                @if($disabled == true)

                                <td date="{{ date('Y-m-d', strtotime($d)) }}" from="{{date('H:i', $time )}}" to="{{date('H:i', $time + (60 * 30 ))}}" teacher-id="{{ $teacher->id }}" class="sched-block closed disabled" style="background-color: #212121;">DISABLED
                                </td>
                                @else
                                <td date="{{ date('Y-m-d', strtotime($d)) }}" from="{{date('H:i', $time )}}" to="{{date('H:i', $time + (60 * 30 ))}}" teacher-id="{{ $teacher->id }}" class="sched-block status {{ (($sched_open == true ) && ($booked != true))? 'open' : 'closed'}} {{($booked == true )? 'booked' : ''}}">
                                  @if($booked == true)
                                    <span class="booked-text">{{ 'BOOKED' }} {{ ($owned == true )? 'on you': 'on' }}</span><br/>
                                    <span class="student-id">
                                      @if($owned == true)
                                        @if($bookby->user_type == "STUDENT")
                                          by Yourself
                                        @else
                                          by {{ $bookby->user_type }}
                                        @endif
                                      @else
                                        {{ 'Other Student' }}
                                      @endif
                                      </span>
                                    
                                  @else
                                    {{ ($sched_open == true )? 'OPEN' : 'CLOSED' }}
                                  @endif

                                  @if($passed==true)
                                  
                                  @endif
                                  </td>
                                  @endif


                                </tr>
                              @endfor
                              </tbody>
                            </table>
                            <!-- / Content -->
                          </td>
                          <?php
                            $d = date('Y-m-d', strtotime($d .'+1 day'));
                          }
                          ?>
                          </tr>

                        </tbody>
                      </ul>
                    </tr></thead>
                  </table>
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
                        <h4 class="modal-title" id="myModalLabel">Book A Class with Teacher {{ $teacher->firstname }}</h4>
                    </div>
                    <div class="modal-body">
                        <div id="testmodal" style="padding: 5px 20px;">
                            <!-- <form id="booking-form" class="form-horizontal calender" role="form"> -->
                                {{ Form::open(array('action' => 'Student\StudentClassController@store', 
                                'id' => 'booking-form', 'class' => 'form-horizontal calendar', 'role' => 'form')) }}
                                <div class="form-group">
                                    <!-- <label class="col-sm-3 control-label">Tutor</label> -->
                                    <!-- <div class="col-sm-9"> -->
                                        <!-- <input type="text" class="form-control" id="tutor" name="tutor" value="{{ $teacher->lastname }} {{ $teacher->firstname }}" readonly="" > -->
                                        <input type="hidden" class="form-control" id="tutor_id" name="tutor_id">

                                    <!-- </div> -->
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

            //check all row of this day
            $('td.status').each(function(index, row){

              var currentTime = new Date('{{ date($current_time) }}');
              currentTime.setMinutes(currentTime.getMinutes()+30);

              var class_date = $(row).attr('date');
              var from = $(row).attr('from');
              var class_sched = new Date(class_date + ' ' + from);

              if(class_sched <  currentTime ){
                //if not close the close
                if(!$(row).hasClass('booked')){
                  if ($(row).hasClass('open')) {
                    $(row).removeClass('open');                
                  }
                  if (!$(row).hasClass('closed')) {
                    $(row).addClass('closed');                
                  }
                $(row).html("CLOSED");
                }
                // console.log($(row).closest('tr').find('td button.book'));
                $(row).closest('tr').find('td button.book').remove();

              }

            });

            
        </script>

@endsection
    