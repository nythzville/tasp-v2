@extends('layouts.admin.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3> {{ $student->firstname }} {{ $student->lastname }} <span id="clock" class="small">Book A class</span></h3> 
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Teacher {{ $teacher->firstname }}'s <small> Schedule</small></h2> 
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
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
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
                          
                          <td class="days">
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
                                ?>
                                <td date="{{ date('Y-m-d', strtotime($d)) }}" hour="{{ date('H', $time ) }}" from="{{date('H:i', $time )}}" to="{{date('H:i', $time + (60 * 30 ))}}" teacher-id="{{ $teacher->id }}" class="status {{ (($sched_open == true ) && ($booked != true))? 'open' : 'closed'}} {{($booked == true )? 'booked' : ''}}">
                                  @if($booked == true)
                                    {{ 'BOOKED' }}
                                    <!-- {{ ($owned == true )? ' BY '.$bookby->user_type : '' }} -->
                                    
                                  @else
                                  {{ ($sched_open == true )? 'OPEN' : 'CLOSED' }}
                                  @endif

                                  @if($passed==true)
                                  @endif
                                  </td>
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
                        <h4 class="modal-title" id="myModalLabel">Book a Class for {{ $student->firstname }} {{ $student->lastname }} with Teacher {{ $teacher->firstname }}</h4>
                    </div>
                    <div class="modal-body">
                        <div id="testmodal" style="padding: 5px 20px;">
                           
                            <!-- <form id="booking-form" class="form-horizontal calender" role="form"> -->
                                {{ Form::open(array('url' => 'admin/students/'.$student->id.'/teachers/'.$teacher->id.'/book', 
                                'id' => 'booking-form', 'class' => 'form-horizontal calendar', 'role' => 'form', 'method' => 'POST')) }}
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Details</label>
                                    <div class="col-sm-9">
                                       <p>
                                          Student:  {{ $student->firstname }} <br/>
                                          Teacher:  {{ $teacher->firstname }}
                                        </p>
                                        <!-- <input type="text" class="form-control" id="tutor" name="tutor" value="{{ $teacher->lastname }} {{ $teacher->firstname }}" readonly="" > -->
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
                                <div class="form-group">
                                   <label class="col-sm-3 control-label">Class Type</label>
                                    <div class="col-sm-9">
                                      <select name="type" class="form-control">
                                        <option value="REGULAR">Regular</option>
                                        <option value="TRIAL">Trial</option>
                                      </select>
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
            $('table#<?php echo date('Y-m-d') ?> tbody tr td.status').each(function(index, row){

              var currentTime = new Date();
              var currentHours = currentTime.getHours ( );

              var from = parseInt($(row).attr('hour'));
              if(from <= (parseInt(currentHours) + 2 )){
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

            function updateClock ( )
            {
            var currentTime = new Date ( );
              var currentHours = currentTime.getHours ( );
              var currentMinutes = currentTime.getMinutes ( );
              var currentSeconds = currentTime.getSeconds ( );

              // Pad the minutes and seconds with leading zeros, if required
              currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
              currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;

              // Choose either "AM" or "PM" as appropriate
              var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";

              // Convert the hours component to 12-hour format if needed
              currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;

              // Convert an hours component of "0" to "12"
              currentHours = ( currentHours == 0 ) ? 12 : currentHours;

              // Compose the string for display
              var currentTimeString = currentHours + ":" + currentMinutes +  "<small>" + timeOfDay + "</small>";
              
              
              
              // $("#clock").html(currentTimeString);
                  
           }

          jQuery(document).ready(function($)
          {
             
             setInterval('updateClock()', 1000);
             

          });
        </script>

@endsection
    