<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Teacher | {{ $teacher->lastname }} {{ $teacher->firstname }} </title>

    <!-- Bootstrap core CSS -->

    <link href="{{ url('/')}}/admin/css/bootstrap.min.css" rel="stylesheet">

    <link href="{{ url('/')}}/admin/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ url('/')}}/admin/css/animate.min.css" rel="stylesheet">
    <!-- Custom styling plus plugins -->
    <link rel="stylesheet" type="text/css" href="{{ url('/')}}/admin/css/maps/jquery-jvectormap-2.0.1.css" />
    <link href="{{ url('/')}}/admin/css/icheck/flat/green.css" rel="stylesheet" />
    <link href="{{ url('/')}}/admin/css/floatexamples.css" rel="stylesheet" type="text/css" />

    <link href="{{ url('/')}}/admin/css/calendar/fullcalendar.css" rel="stylesheet">
    <link href="{{ url('/')}}/admin/css/custom.css" rel="stylesheet">

    <script src="{{ url('/')}}/admin/js/jquery.min.js"></script>
    <script src="{{ url('/')}}/admin/js/nprogress.js"></script>
    <script>
        // NProgress.start();
    </script>
    
    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>


<body class="nav-md">

    <div class="container body">


        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="{{ url('/') }}" class="site_title"><i class="fa fa-paw"></i> <span>Easy A English!</span></a>
                    </div>
                    <div class="clearfix"></div>

                    <!-- menu prile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            @if($user->user_image == null)
                                @if($teacher->gender == 'male')
                                    <img src="{{ url('/')}}/admin/images/boy-avatar.png" alt="{{ $teacher->lastname }} {{ $teacher->firstname }}" class="img-circle profile_img">
                                @elseif($teacher->gender == 'female')
                                    <img src="{{ url('/')}}/admin/images/girl-avatar.png" alt="{{ $teacher->lastname }} {{ $teacher->firstname }}" class="img-circle profile_img">
                                @endif
                            @else
                                <img src="{{ url($user->user_image) }}" alt="{{ $teacher->lastname }} {{ $teacher->firstname }}" class="img-circle profile_img">

                            @endif
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>{{ $teacher->lastname }} {{ $teacher->firstname }}</h2>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->
                    <br />

                    @include('layouts.teacher.sidebar')

                    @yield('content')
                    <!-- footer content -->

                    <footer>
                        <div class="">
                            <p class="pull-right">Easy A English <a>Learning Center</a>. |
                                <span class="lead"> <i class="fa fa-paw"></i> MAKENA Labs!</span>
                            </p>
                        </div>
                        <div class="clearfix"></div>
                    </footer>
                    <!-- /footer content -->
                </div>
            <!-- /page content -->

        </div>

    </div>

    <div id="custom_notifications" class="custom-notifications dsp_none">
        <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
        </ul>
        <div class="clearfix"></div>
        <div id="notif-group" class="tabbed_notifications"></div>
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
                        {{ Form::open(array( 'url' => 'teacher/classes', 'id'=>'evaluation-form', 'class'=>'form-horizontal calender', 'role'=>'form' ,'method' => 'POST')) }}
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

    <script src="{{ url('/')}}/admin/js/bootstrap.min.js"></script>
    <!-- bootstrap progress js -->
    <script src="{{ url('/')}}/admin/js/progressbar/bootstrap-progressbar.min.js"></script>
    <script src="{{ url('/')}}/admin/js/nicescroll/jquery.nicescroll.min.js"></script>
   
    <script src="{{ url('/')}}/admin/js/icheck/icheck.min.js"></script>
    
    <script src="{{ url('/')}}/admin/js/custom.js"></script>
    <script src="{{ url('/')}}/admin/js/moment.min.js"></script>

    <script src="{{ url('/')}}/admin/js/datatables/js/jquery-dataTables.js"></script>
    <script src="{{ url('/')}}/admin/js/datatables/tools/js/dataTables.tableTools.js"></script>
    
    <script type="text/javascript">
         $(document).ready(function () {
                var oTable = $('.list-table').dataTable({
                    "oLanguage": {
                        "sSearch": "Search all columns:"
                    },
                    "aoColumnDefs": [
                        {
                            'bSortable': false,
                            'aTargets': [0,1,2,3,4,5]
                        } //disables sorting for column one
            ],
                    'iDisplayLength': 12,
                    "sPaginationType": "full_numbers",
                    // "dom": 'T<"clear">lfrtip',
                    // "tableTools": {
                        // "sSwfPath": "{{ url('admin/js/datatables/tools/swf/copy_csv_xls_pdf.swf') }}"
                    // }
                });
                $("tfoot input").keyup(function () {
                    /* Filter on the column based on the index of this element's parent <th> */
                    oTable.fnFilter(this.value, $("tfoot th").index($(this).parent()));
                });
                $("tfoot input").each(function (i) {
                    asInitVals[i] = this.value;
                });
                $("tfoot input").focus(function () {
                    if (this.className == "search_init") {
                        this.className = "";
                        this.value = "";
                    }
                });
                $("tfoot input").blur(function (i) {
                    if (this.value == "") {
                        this.className = "search_init";
                        this.value = asInitVals[$("tfoot input").index(this)];
                    }
                });

                var reportTable = $('.report-table').dataTable({ 
                    dom: 'T<"clear">lf',
                    buttons: [
                        'print'
                    ]
                });
        });
    </script>

    <!-- Evaluation Form Show -->
    <script type="text/javascript">
        $('.btn-view-evaluation').click(function(){
            var class_id = $(this).attr('class-id');
            var date_value = $(this).attr('date-value');
            
            $('input#date').val(date_value);

            // var url = $('#evaluation-form').attr('action');
            var url = "{{ url('/teacher/classes') }}";
            $('#UpdateEvaluation').modal('show');
            $('#evaluation-form').attr('action', url + '/' + class_id + '/evaluation');
            $.get(url + '/' + class_id + '/evaluation' )
            .done(function(response) {

                if (response.evaluation != null) {

                    $('input#date').val(response.evaluation.date);
                    $('input#attendance').val(response.evaluation.attendance);
                    $('input#subject').val(response.evaluation.subject);
                    $('input#topic').val(response.evaluation.topic);

                    $('textarea#comment').val(response.evaluation.comment);

                }else{
                    // $('input#date').val(null);
                    $('input#attendance').val(null);
                    $('input#subject').val(null);
                    $('input#topic').val(null);

                    
                    $('textarea#comment').val(null);   
                }

                console.log(response);
            })
            .fail(function(response) {
                console.log(response);
            });
        });

        // Teacher Clock
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
              
              
              
            $("#clock").html(currentTimeString);
                  
        }

        function unevaluated_class_time(){

            $('.btn-view-evaluation span.time').each(function(index, time){

                var basetime = Date.parse($(time).attr('time-value'));
                // var lapsed = current - basetime;
                // console.log( lifeSpan(basetime)  );
                $(time).html(lifeSpan(basetime) );
            });
        }
        // Get passed time
        function lifeSpan(t0) {
            var x =new Date()-t0, a=x, i=0,s=0,m=0,h=0,j=0;
          if(a>=1){i=a%1000;a=(a-i)/1000;
          if(a>=1){s=a%60;a=(a-s)/60;
          if(a>=1){m=a%60;a=(a-m)/60;
          if(a>=1){h=a%24;a=(a-h)/24;
          if(a>=1){j=a;//...
          }}}}}

          var output = '';
          if (j > 0) {
            output = j + ' days ago';
          }else{
            output = m +'mins '+ h + ' hours ago ';
          }
          return output;
        }
        jQuery(document).ready(function($)
        {
         
         setInterval('updateClock()', 1000);
         setInterval('unevaluated_class_time()', 1000);
         

      });
    </script>
    <!-- / End Evaluation script -->
    @if($page == 'schedule')
    <script src="{{ url('/')}}/admin/js/calendar/fullcalendar.min.js"></script>
    <script>
            $(window).load(function () {

                var date = new Date();
                var d = date.getDate();
                var m = date.getMonth();
                var y = date.getFullYear();
                var started;
                var categoryClass;

                var calendar = $('#schedule-calendar').fullCalendar({
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

                        started = start;
                        ended = end

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

                        $('#schedule-date').val(year + '-' + (month + 1) + '-' + day);
                        $('#from-time').val(start_hours + ':' + start_minutes);
                        $('#to-time').val(end_hours + ':' + end_minutes);

                        
                        
                    },
                    eventClick: function (calEvent, jsEvent, view) {
                        //alert(calEvent.title, jsEvent, view);

                        $('#fc_edit').click();


                        var start = calEvent.start;
                        var end = calEvent.end;

                        var day = start._d.getDate();
                        var month = start._d.getMonth();
                        var year = start._d.getFullYear();
                        
                        var start_hours, start_minutes;
                        var end_hours, end_minutes;

                        // Get hours
                        if(start._d.getHours() > 9){
                            start_hours = start._d.getHours();
                        }else{
                            start_hours = "0" + start._d.getHours();
                        }
                        // Get Minutes
                        if(start._d.getMinutes() > 9){
                            start_minutes = start._d.getMinutes();
                        }else{
                            start_minutes = "0" + start._d.getMinutes();
                        }
                        
                        // Get hours
                        if(end._d.getHours() > 9){
                            end_hours = end._d.getHours();
                        }else{
                            end_hours = "0" + end._d.getHours();
                        }
                        // Get Minutes
                        if(end._d.getMinutes() > 9){
                            end_minutes = end._d.getMinutes();
                        }else{
                            end_minutes = "0" + end._d.getMinutes();
                        }

                        $('#edit-schedule-date').val(year + '-' + (month + 1) + '-' + day);
                        $('#edit-from-time').val(start_hours + ':' + start_minutes);
                        $('#edit-to-time').val(end_hours + ':' + end_minutes);
                        
                        // console.log(calEvent.id);
                        $('#edit-schedule-frm').attr('action', calEvent.edit_url);
                        categoryClass = $("#event_type").val();

                        $(".antosubmit2").on("click", function () {
                            $('#edit-schedule-frm').submit();
                            calendar.fullCalendar('updateEvent', calEvent);
                            $('.antoclose2').click();
                        });
                        calendar.fullCalendar('unselect');
                    },
                    editable: false,
                    events: [
                     
                        @foreach($schedules as $schedule)   
                        {
                            title: '{{ $schedule->status }}',
                            start: new Date('{{ Date( "Y-m-d H:i", strtotime($schedule->start )) }}'),
                            end: new Date('{{ Date( "Y-m-d H:i", strtotime($schedule->end )) }}'),
                            allDay: false,
                            edit_url: '{{ url( 'teacher/schedule/'.$schedule->id ) }}'


                        },
                        @endforeach
                    ]
                    ,
                  selectOverlap: function(event) {
                    return !event.block;
                  }
                });
            

            $(".antosubmit").on("click", function (event) {
                        
                var url = $('#antoform').attr('action');
                var data = $('#antoform').serialize();
                $.post(url,data)
                .done(function(response){   

                    if(response.error == false){
                        calendar.fullCalendar('renderEvent', {
                                title: 'OPEN',
                                start: new Date(response.schedule.start),
                                end: new Date(response.schedule.end),
                            },
                            true // make the event "stick"
                        );

                        var msg = "<div class='alert alert-success alert-dismissible fade in' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong>Horray!</strong> "+ response.msg +"</div>";
                        $('.x_panel').prepend(msg);

                        $('html, body').animate({
                            scrollTop: $(".x_panel").offset().top
                        }, 1000);
                    }else if(response.error == true){
                        var msg = "<div class='alert alert-danger alert-dismissible fade in' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong>Something's wrong!</strong> "+ response.msg +"</div>";
                        $('.x_panel').prepend(msg);

                        $('html, body').animate({
                            scrollTop: $(".x_panel").offset().top
                        }, 1000);
                    }

                })
                .fail(function(response){
                    console.log(response);

                });
                
                $('#schedule-calendar').fullCalendar('unselect');

                $('.antoclose').click();

                event.preventDefault();
                // return false;                         
            });
            });
        </script>
    @endif


    <!-- /datepicker -->
    <!-- /footer content -->
</body>

</html>
