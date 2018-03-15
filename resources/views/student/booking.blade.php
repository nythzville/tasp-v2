@extends('layouts.student.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Book a Class <small>Custom design</small></h2>
                        
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
                        <div id='calendar'></div>

                    </div>
                </div>
            </div>
        </div>
        
    <!-- Start Calender modal -->
    <div id="ScheduleModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">New Schedule</h4>
                </div>
                <div class="modal-body">
                    <div id="testmodal" style="padding: 5px 20px; overflow-x: scroll;">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Time</th>
                                    @if($teachers)
                                    @foreach($teachers as $teacher)
                                        <th>{{ $teacher->lastname }} {{ $teacher->firstname }}</th>
                                    @endforeach
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @for($time = strtotime('00:00'); $time <= strtotime('23:59'); $time = $time +(60*30))
                                <tr>
                                    <th>{{ date('H:i', $time ) }}</th>


                                    <td><button class="btn">Book</button></td>    
                                </tr>
                                
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary antosubmit">Save Schedule</button>
                </div>
            </div>
        </div>
    </div>
   
    <div id="fc_create" data-toggle="modal" data-target="#ScheduleModalNew"></div>
    </div>
    <!-- /page content -->

    <script>
        $(window).load(function () {

            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();
            var started;
            var categoryClass;

            var calendar = $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                selectable: true,
                selectHelper: true,
                select: function (start, end, allDay) {
                    // $('#fc_create').click();

                    started = start;
                    ended = end;
                    // console.log(start);
                    var str_date = start._d.getUTCFullYear() + '-' + (start._d.getUTCMonth() + 1) + '-' + start._d.getUTCDate();
                    
                    window.location = '{{ url("student/book/date") }}/' + str_date;
                },
                events: [
                    
            ]
            });
        });
    </script>


@endsection
