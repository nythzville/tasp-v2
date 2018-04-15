@extends('layouts.teacher.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>My Weekly Classes <small></small></h2>
                        
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <style type="text/css">
                          table.weekdays>tbody>tr>td.days{
                            padding-left: 0;
                            padding-right: 0;
                          }
                          td.open:hover{
                            opacity: .8;
                          }
                          td.open{
                            cursor: default;
                          }
                          td.closed{
                            cursor: default;
                          }
                        </style>
                        <!-- <div id='classes-calendar'></div> -->
                        <!-- Class table -->
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
                                $student_id = "";
                                $disabled = false;
                                // $bookby = $student->getUser;

                                foreach ($classPeriods as $classPeriod) {
                                  if ( date('H:i a', $time ) == date('H:i a', strtotime($classPeriod->start))
                                      && date('Y-m-d', strtotime($d) ) == date('Y-m-d', strtotime($classPeriod->start) )
                                      // && ($classPeriod->teacher ==  $sched->teacher_id)
                                  ) {

                                    $student_id = $classPeriod->getStudent->student_id;
                                      $booked = true;
                                      break;
                                  }
                                }
                                
                                ?>
                                @if($disabled == true)

                                <td date="{{ date('Y-m-d', strtotime($d)) }}" from="{{date('H:i', $time )}}" to="{{date('H:i', $time + (60 * 30 ))}}" teacher-id="{{ $teacher->id }}" class="sched-block closed disabled" style="background-color: #212121;">DISABLED
                                </td>
                                @else
                                <td date="{{ date('Y-m-d', strtotime($d)) }}" from="{{date('H:i', $time )}}" to="{{date('H:i', $time + (60 * 30 ))}}" teacher-id="{{ $teacher->id }}" class="sched-block status {{ (($sched_open == true ) && ($booked != true))? 'open' : 'closed'}} {{($booked == true )? 'booked' : ''}}">
                                  @if($booked == true)
                                    <span class="booked-text">{{ 'BOOKED' }} on</span><br/>
                                    <span class="student-id">
                                      {{ $student_id }}
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
                        <!-- / Class Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End Calender modal -->
@endsection
