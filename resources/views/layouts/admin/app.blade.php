<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Easy A Learning | Admin {{ (isset($page) && ($page == 'REPORTS'))? 'Reports': '' }} </title>

    <!-- Bootstrap core CSS -->

    <link href="{{ url('/')}}/admin/css/bootstrap.min.css" rel="stylesheet">

    <link href="{{ url('/')}}/admin/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ url('/')}}/admin/css/animate.min.css" rel="stylesheet">
    <!-- Custom styling plus plugins -->
    <link rel="stylesheet" type="text/css" href="{{ url('/')}}/admin/css/maps/jquery-jvectormap-2.0.1.css" />
    <link href="{{ url('/')}}/admin/css/icheck/flat/green.css" rel="stylesheet" />
    <link href="{{ url('/')}}/admin/css/floatexamples.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('/')}}/admin/css/datatables/tools/css/dataTables.tableTools.css" rel="stylesheet">


    @if(isset($booking_calendar) && ($booking_calendar == true))
    <link href="{{ url('/')}}/admin/css/calendar/fullcalendar.css" rel="stylesheet">
    <link href="{{ url('/')}}/admin/css/calendar/fullcalendar.print.css" rel="stylesheet" media="print">
    @endif
    @if(isset($page) && ($page == 'teacher_schedule'))
    <link href="{{ url('/')}}/admin/css/calendar/fullcalendar.css" rel="stylesheet">
    @endif
    <link href="{{ url('/')}}/admin/css/custom.css" rel="stylesheet">
    
    <script src="{{ url('/')}}/admin/js/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
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
                        <a href="{{ url('/') }}" class="site_title"><i class="fa">A</i> <span>Easy A English!</span></a>
                    </div>
                    <div class="clearfix"></div>

                    <!-- menu prile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            @if(Auth::user()->user_image == null)
                                    <img src="{{ url('/')}}/admin/images/boy-avatar.png" alt="Admin" class="img-circle profile_img">
                                
                            @else
                                <img src="{{ url(Auth::user()->user_image) }}" alt="Admin" class="img-circle profile_img">

                            @endif
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>Admin</h2>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->
                    <br />

                    @include('layouts.admin.sidebar')

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

    <script src="{{ url('/')}}/admin/js/bootstrap.min.js"></script>
    <script src="{{ url('/')}}/admin/js/nicescroll/jquery.nicescroll.min.js"></script>
    <!-- icheck -->
    <script src="{{ url('/')}}/admin/js/icheck/icheck.min.js"></script>
    <!-- daterangepicker -->
    <script type="text/javascript" src="{{ url('/')}}/admin/js/moment.min.js"></script>
    <script type="text/javascript" src="{{ url('/')}}/admin/js/datepicker/daterangepicker.js"></script>
    <!-- sparkline -->
    <script src="{{ url('/')}}/admin/js/sparkline/jquery.sparkline.min.js"></script>


    <!-- bootstrap progress js -->
    <script src="{{ url('/')}}/admin/js/progressbar/bootstrap-progressbar.min.js"></script>
    <script src="{{ url('/')}}/admin/js/nicescroll/jquery.nicescroll.min.js"></script>

    <!-- DataTables --> 
    <script src="{{ url('/')}}/admin/js/datatables/js/jquery-dataTables.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> -->
    <script src="{{ url('/')}}/admin/js/datatables/tools/js/dataTables.tableTools.js"></script>
    <!-- <script src="https://cdn.datatables.net/buttons/1.5.0/js/dataTables.buttons.min.js"></script> -->
    <!-- <script src="//cdn.datatables.net/buttons/1.5.0/js/buttons.print.min.js"></script> -->

    <script type="text/javascript">
        $(document).ready(function () {
                $('.green-ckeck').iCheck({
                    checkboxClass: 'icheckbox_flat-green',
                    radioClass: 'iradio_flat-green'
                });
            });
    </script>

    @if(isset($page) && ($page == 'dashboard'))
    <!-- flot js -->
    <!--[if lte IE 8]><script type="text/javascript" src="{{ url('/')}}/admin/js/excanvas.min.js"></script><![endif]-->
    <script type="text/javascript" src="{{ url('/')}}/admin/js/flot/jquery.flot.js"></script>
    <script type="text/javascript" src="{{ url('/')}}/admin/js/flot/jquery.flot.pie.js"></script>
    <script type="text/javascript" src="{{ url('/')}}/admin/js/flot/jquery.flot.orderBars.js"></script>
    <script type="text/javascript" src="{{ url('/')}}/admin/js/flot/jquery.flot.time.min.js"></script>
    <script type="text/javascript" src="{{ url('/')}}/admin/js/flot/date.js"></script>
    <script type="text/javascript" src="{{ url('/')}}/admin/js/flot/jquery.flot.spline.js"></script>
    <script type="text/javascript" src="{{ url('/')}}/admin/js/flot/jquery.flot.stack.js"></script>
    <script type="text/javascript" src="{{ url('/')}}/admin/js/flot/curvedLines.js"></script>
    <script type="text/javascript" src="{{ url('/')}}/admin/js/flot/jquery.flot.resize.js"></script>

    <!-- flot -->
    <script type="text/javascript">
        //define chart clolors ( you maybe add more colors if you want or flot will add it automatic )
        var chartColours = ['#FF6F0C', '#96CA59', '#3F97EB', '#72c380', '#6f7a8a', '#f7cb38', '#5a8022', '#2c7282'];

        //generate random number for charts
        randNum = function () {
            return (Math.floor(Math.random() * (1 + 40 - 20))) + 20;
        }

        $(function () {
            var d1 = [];
            var d2 = [];

            @if(isset($class_per_day) )
            @foreach($class_per_day as $classes)
                d1.push([new Date('{{ $classes["date"] }}'), {{ $classes['value'] }}]);
            @endforeach
            @endif
            
            console.log(d1);
            var chartMinDate = d1[0][0]; //first day
            var chartMaxDate = d1[29][0]; //last day

            var tickSize = [1, "day"];
            var tformat = "%d/%m/%y";

            //graph options
            var options = {
                grid: {
                    show: true,
                    aboveData: true,
                    color: "#3f3f3f",
                    labelMargin: 10,
                    axisMargin: 0,
                    borderWidth: 0,
                    borderColor: null,
                    minBorderMargin: 5,
                    clickable: true,
                    hoverable: true,
                    autoHighlight: true,
                    mouseActiveRadius: 100
                },
                series: {
                    lines: {
                        show: true,
                        fill: true,
                        lineWidth: 2,
                        steps: false
                    },
                    points: {
                        show: true,
                        radius: 4.5,
                        symbol: "circle",
                        lineWidth: 3.0
                    }
                },
                legend: {
                    position: "ne",
                    margin: [0, -25],
                    noColumns: 0,
                    labelBoxBorderColor: null,
                    labelFormatter: function (label, series) {
                        // just add some space to labes
                        return label + '&nbsp;&nbsp;';
                    },
                    width: 40,
                    height: 1
                },
                colors: chartColours,
                shadowSize: 0,
                tooltip: true, //activate tooltip
                tooltipOpts: {
                    content: "%s: %y.0",
                    xDateFormat: "%d/%m",
                    shifts: {
                        x: -30,
                        y: -50
                    },
                    defaultTheme: false
                },
                yaxis: {
                    min: 0
                },
                xaxis: {
                    mode: "time",
                    minTickSize: tickSize,
                    timeformat: tformat,
                    min: chartMinDate,
                    max: chartMaxDate
                }
            };
            var plot = $.plot($("#placeholder33x"), [{
                label: "Competed Class",
                data: d1,
                lines: {
                    fillColor: "rgba(255,111,12, 0.12)"
                    // fillColor: "rgba(150, 202, 89, 0.12)"
                }, //#96CA59 rgba(150, 202, 89, 0.42)
                points: {
                    fillColor: "#fff"
                }
            }], options);
        });
    </script>
    <!-- /flot -->
    @endif
    <script type="text/javascript">
         $(document).ready(function () {
                var oTable = $('.list-table').dataTable({
                    "oLanguage": {
                        "sSearch": "Search all columns:"
                    },
            //         "aoColumnDefs": [
            //             {
            //                 'bSortable': false,
            //                 'aTargets': [0,1,2,3,4,5,6]
            //             } //disables sorting for column one
            // ],
                    "order": [],
                    "columnDefs": [ {
                      "targets"  : 'no-sort',
                      "orderable": false,
                      "order": []
                    }],
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

    <script src="{{ url('/')}}/admin/js/custom.js"></script>

    
    <!-- datepicker -->
    <script type="text/javascript">
        $(document).ready(function () {

            var cb = function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                //alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
            }

            var optionSet1 = {
                startDate: moment().subtract(29, 'days'),
                endDate: moment(),
                minDate: '01/01/2017',
                maxDate: '12/31/2027',
                dateLimit: {
                    days: 60
                },
                showDropdowns: true,
                showWeekNumbers: true,
                timePicker: false,
                timePickerIncrement: 1,
                timePicker12Hour: true,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                opens: 'left',
                buttonClasses: ['btn btn-default'],
                applyClass: 'btn-small btn-primary',
                cancelClass: 'btn-small',
                format: 'MM/DD/YYYY',
                separator: ' to ',
                locale: {
                    applyLabel: 'Submit',
                    cancelLabel: 'Clear',
                    fromLabel: 'From',
                    toLabel: 'To',
                    customRangeLabel: 'Custom',
                    daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                    monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    firstDay: 1
                }
            };
            $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
            $('#reportrange').daterangepicker(optionSet1, cb);
            $('#reportrange').on('show.daterangepicker', function () {
                // console.log("show event fired");
            });
            $('#reportrange').on('hide.daterangepicker', function () {
                // console.log("hide event fired");
            });
            $('#reportrange').on('apply.daterangepicker', function (ev, picker) {
                // console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
                // window.location.href = "http://ea-english.com/admin/reports?from_date="+ picker.startDate.format('YYYY-MM-DD') + "&to_date=" + picker.endDate.format('YYYY-MM-DD');

                window.location.href = "{{ url('admin/reports') }}?from_date="+ picker.startDate.format('YYYY-MM-DD') + "&to_date=" + picker.endDate.format('YYYY-MM-DD');

                // console.log(picker.startDate.format('YYYY-MM-DD'));  
            });
            $('#reportrange').on('cancel.daterangepicker', function (ev, picker) {
                console.log("cancel event fired");
            });
            $('#options1').click(function () {
                $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
            });
            $('#options2').click(function () {
                $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
            });
            $('#destroy').click(function () {
                $('#reportrange').data('daterangepicker').remove();
            });
        });
    </script>
    <!-- /datepicker -->
    <!-- /footer content -->


    <!-- Booking Date Picker -->
    @if(isset($booking_calendar) && ($booking_calendar == true))
    <script src="{{ url('/')}}/admin/js/moment.min.js"></script>
    <!-- <script src="{{ url('/')}}/admin/js/calendar/fullcalendar.min.js"></script> -->
    <script src="{{ url('/')}}/admin/js/calendar/fullcalendar.js"></script>

    <script>
    $(document).ready(function () {

        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        var started;
        var categoryClass;

        var calendar = $('#booking-calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'agendaWeek'
            },
            defaultView: 'agendaWeek',
            
            selectable: true,
            selectHelper: true,
            select: function (start, end) {
                $('#fc_create').click();

                started = start;
                ended = end

                $(".antosubmit").on("click", function () {
                    var title = $("#title").val();
                    if (end) {
                        ended = end
                    }
                    categoryClass = $("#event_type").val();

                    if (title) {
                        calendar.fullCalendar('renderEvent', {
                                title: title,
                                start: started,
                                end: end
                            },
                            true // make the event "stick"
                        );
                    }
                    $('#class_start').val(start.toISOString);
                    $('#class_end').val(end.toISOString);

                    $('#title').val('');
                    calendar.fullCalendar('unselect');

                    $('.antoclose').click();

                    return false;
                });
            },
            eventClick: function (calEvent, jsEvent, view) {
                //alert(calEvent.title, jsEvent, view);

                $('#fc_edit').click();
                $('#title2').val(calEvent.title);
                categoryClass = $("#event_type").val();

                $(".antosubmit2").on("click", function () {
                    calEvent.title = $("#title2").val();

                    calendar.fullCalendar('updateEvent', calEvent);
                    $('.antoclose2').click();
                });
                calendar.fullCalendar('unselect');
            },
            editable: true,
            events: [
                {
                    title: 'Class B',
                    start: new Date(y, m, d, 12, 30),
                    end: new Date(y, m, d, 13, 0)

            },
                {
                    title: 'Class A',
                    start: new Date(y, m, d, 14, 0),
                    end: new Date(y, m, d, 14, 30)
            },
                {
                    title: 'Class C',
                    start: new Date(y, m, d, 10, 30),
                    end: new Date(y, m, d, 11, 0 ),

            },
                {
                    title: 'Class D',
                    start: new Date(y, m, d , 12, 0),
                    end: new Date(y, m, d, 12, 30)
            },
                {
                    title: 'Class E',
                    start: new Date(y, m, d, 19, 0),
                    end: new Date(y, m, d, 19, 30)
            }
        ]
        });
    });
    </script>
    @endif

    <!-- / End Evaluation script -->
    @if(isset($page) && ($page == 'teacher_schedule'))
    <!-- <script src="{{ url('/')}}/admin/js/calendar/fullcalendar.min.js"></script> -->
    <script src="{{ url('/')}}/admin/js/calendar/fullcalendar.js"></script>

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
                        ended = end;

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

                        // console.log(start);

                        // calendar.fullCalendar('unselect');

                        // $(".antosubmit").on("click", function () {
                        //     $('#antoform').submit();
                           
                        // });

                        
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
                            edit_url: '{{ url( 'admin/teachers/'.$teacher->id.'/schedule/'.$schedule->id ) }}'

                        },
                        @endforeach
                    ]
                });
                
                $(".antosubmit").on("click", function (event) {
                            
                    var url = $('#antoform').attr('action');
                    var data = $('#antoform').serialize();
                    $.post(url,data)
                    .done(function(response){   
                        console.log(response);
                        if(response.error == false){
                            response.schedules.forEach(function(sched, index){

                                console.log(sched);
                                calendar.fullCalendar('renderEvent', {
                                        title: sched.status,
                                        start: new Date(sched.start),
                                        end: new Date(sched.end),
                                    },
                                    true // make the event "stick"
                                );
                            });

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
                    
                    $('#title').val('');
                    calendar.fullCalendar('unselect');

                    $('.antoclose').click();

                    event.preventDefault();
                    return false;                         
                });
            });
        </script>
    @endif

    <script>
    $(".delete-form").on("submit", function(){
        return confirm("Do you want to delete?");
    });

    $(".delete-form-student").on("submit", function(){
        return confirm("Do you want to delete this Student?");
    });

    $(".delete-form-teacher").on("submit", function(){
        return confirm("Do you want to delete this Teacher?");
    });

    $(".delete-form-agent").on("submit", function(){
        return confirm("Do you want to delete this Agent?");
    });

    $(".cancel-form-class").on("submit", function(){
        return confirm("Do you want to Cancel this Class?");
    });

    $(".delete-form-class").on("submit", function(){
        return confirm("Do you want to Delete this Class?");
    });

    $(".cancel-form-news").on("submit", function(){
        return confirm("Do you want to delete this News?");
    });
    </script>
</body>

</html>
