<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Easy A Learning | Agent </title>

    <!-- Bootstrap core CSS -->

    <link href="{{ url('/')}}/admin/css/bootstrap.min.css" rel="stylesheet">

    <link href="{{ url('/')}}/admin/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ url('/')}}/admin/css/animate.min.css" rel="stylesheet">
    <!-- Custom styling plus plugins -->
    <link href="{{ url('/')}}/admin/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('/')}}/admin/css/maps/jquery-jvectormap-2.0.1.css" />
    <link href="{{ url('/')}}/admin/css/icheck/flat/green.css" rel="stylesheet" />
    <link href="{{ url('/')}}/admin/css/floatexamples.css" rel="stylesheet" type="text/css" />

    @if(isset($booking_calendar) && ($booking_calendar == true))
    <link href="{{ url('/')}}/admin/css/calendar/fullcalendar.css" rel="stylesheet">
    <link href="{{ url('/')}}/admin/css/calendar/fullcalendar.print.css" rel="stylesheet" media="print">
    @endif
    <script src="{{ url('/')}}/admin/js/jquery.min.js"></script>

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
                                @if($agent->gender == 'male')
                                    <img src="{{ url('/')}}/admin/images/boy-avatar.png" alt="{{ $agent->lastname }} {{ $agent->firstname }}" class="img-circle profile_img">
                                @elseif($agent->gender == 'female')
                                    <img src="{{ url('/')}}/admin/images/girl-avatar.png" alt="{{ $agent->lastname }} {{ $agent->firstname }}" class="img-circle profile_img">
                                @endif
                            @else
                                <img src="{{ url(Auth::user()->user_image) }}" alt="{{ $agent->lastname }} {{ $agent->firstname }}" class="img-circle profile_img">

                            @endif
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>Agent</h2>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->
                    <br />

                    @include('layouts.agent.sidebar')

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

    <!-- bootstrap progress js -->
    <script src="{{ url('/')}}/admin/js/progressbar/bootstrap-progressbar.min.js"></script>
    <script src="{{ url('/')}}/admin/js/nicescroll/jquery.nicescroll.min.js"></script>

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
                minDate: '01/01/2012',
                maxDate: '12/31/2015',
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
                console.log("show event fired");
            });
            $('#reportrange').on('hide.daterangepicker', function () {
                console.log("hide event fired");
            });
            $('#reportrange').on('apply.daterangepicker', function (ev, picker) {
                console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
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
    <script src="{{ url('/')}}/admin/js/calendar/fullcalendar.min.js"></script>
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

    <script>
    $(".delete-form").on("submit", function(){
        return confirm("Do you want to delete?");
    });

    $(".cancel-form-class").on("submit", function(){
        return confirm("Do you want to Cancel this Class?");
    });

    </script>
</body>

</html>
