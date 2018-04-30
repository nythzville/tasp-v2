@extends('layouts.admin.app')

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
                    
                    window.location = '{{ url("admin/students/".$student->id."/book_by_date") }}/' + str_date;
                },
                events: [
                    
            ]
            });
        });
    </script>


@endsection
