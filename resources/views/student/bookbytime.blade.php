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

                        <div id='calendar'></div>

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
                    <h4 class="modal-title" id="myModalLabel">Book A Class</h4>
                </div>
                <div class="modal-body">
                    <div id="testmodal" style="padding: 5px 20px;">
                        <form id="booking-form" class="form-horizontal calender" role="form">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Tutor</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="teacher" name="teacher">
                                        <option> -- Select Teacher --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Date</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="schedule-date" name="schedule-date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Time</label>
                                <div class="col-sm-4">
                                    <input type="time" class="form-control" id="from-time" name="from-time">
                                </div>
                                <div class="col-sm-5">
                                    <input type="time" class="form-control" id="to-time" name="to-time">
                                </div>
                            </div>
                            
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary antosubmit">Book</button>
                </div>
            </div>
        </div>
    </div>
  

    <div id="fc_create" data-toggle="modal" data-target="#BookingModal"></div>
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
                    right: 'agendaWeek'
                },
                defaultView: 'agendaWeek',
                selectable: true,
                selectHelper: true,
                select: function (start, end, allDay) {
                    $('#fc_create').click();

                    // started = start;
                    // ended = end;
                    // console.log(start._d.toISOString());
                    $.ajax({
                         url: '{{ url("/student/book/available/teacher") }}',
                         type: "POST",
                         data: { start:start._d.toISOString(), end:end._d.toISOString() },
                         headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                        })
                     .done(function (data) {
                         // console.log("Response " + JSON.stringify(data));

                         data.sched.forEach( function( sched ){
                            console.log(sched);
                            $('#teacher').append( '<option value="'+sched.teacher.id+'">' + sched.teacher.firstname +' '+sched.teacher.lastname+'</option>' );
                         });
                     });


                        var day = start._d.getUTCDate();
                        var month = start._d.getUTCMonth();
                        var year = start._d.getUTCFullYear();
                        
                        var start_hours, start_minutes;
                        var end_hours, end_minutes;

                        // Get hours
                        if(start._d.getUTCHours() > 9){
                            start_hours = start._d.getUTCHours();
                        }else{
                            start_hours = "0" + start._d.getUTCHours();
                        }
                        // Get Minutes
                        if(start._d.getUTCMinutes() > 9){
                            start_minutes = start._d.getUTCMinutes();
                        }else{
                            start_minutes = "0" + start._d.getUTCMinutes();
                        }
                        
                        // Get hours
                        if(end._d.getUTCHours() > 9){
                            end_hours = end._d.getUTCHours();
                        }else{
                            end_hours = "0" + end._d.getUTCHours();
                        }
                        // Get Minutes
                        if(end._d.getUTCMinutes() > 9){
                            end_minutes = end._d.getUTCMinutes();
                        }else{
                            end_minutes = "0" + end._d.getUTCMinutes();
                        }

                        $('#schedule-date').val(year + '-' + month + '-' + day);
                        $('#from-time').val(start_hours + ':' + start_minutes);
                        $('#to-time').val(end_hours + ':' + end_minutes);
                        
                    // $(".antosubmit").on("click", function () {
                    //     var title = $("#title").val();
                    //     if (end) {
                    //         ended = end
                    //     }
                    //     categoryClass = $("#event_type").val();

                    //     if (title) {
                    //         calendar.fullCalendar('renderEvent', {
                    //                 title: title,
                    //                 start: started,
                    //                 end: end,
                    //                 allDay: allDay
                    //             },
                    //             true // make the event "stick"
                    //         );
                    //     }
                    //     $('#title').val('');
                    //     calendar.fullCalendar('unselect');

                    //     $('.antoclose').click();

                    //     return false;
                    // });
                },
                events: [
                    
            ]
            });
        });
    </script>


@endsection
