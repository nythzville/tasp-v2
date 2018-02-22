<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Student | {{ $student->lastname }} {{ $student->firstname }} </title>

    <!-- Bootstrap core CSS -->

    <link href="{{ url('/')}}/admin/css/bootstrap.min.css" rel="stylesheet">

    <link href="{{ url('/')}}/admin/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ url('/')}}/admin/css/animate.min.css" rel="stylesheet">
    <!-- Custom styling plus plugins -->
    <link href="{{ url('/')}}/admin/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('/')}}/admin/css/maps/jquery-jvectormap-2.0.1.css" />
    <link href="{{ url('/')}}/admin/css/icheck/flat/green.css" rel="stylesheet" />
    <link href="{{ url('/')}}/admin/css/floatexamples.css" rel="stylesheet" type="text/css" />

    <link href="{{ url('/')}}/admin/css/calendar/fullcalendar.css" rel="stylesheet">
    <link rel="stylesheet" media="print" href="{{ url('/')}}/admin/css/progress-report.print.css">

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
                             @if($user->user_image)
                            <img src="{{ url($user->user_image) }}" alt="" class="img-circle profile_img">
                            @else
                            <img src="{{ url('/admin') }}/images/user.png" alt=""  class="img-circle profile_img">

                            @endif
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>{{ $student->firstname }} {{ $student->lastname }}</h2>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->
                    <br />

                    @include('layouts.student.sidebar')

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
    <script src="{{ url('/')}}/admin/js/icheck/icheck.min.js"></script>

     <!-- DataTables --> 
    <script src="{{ url('/')}}/admin/js/datatables/js/jquery-dataTables.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> -->
    <script src="{{ url('/')}}/admin/js/datatables/tools/js/dataTables.tableTools.js"></script>

    <script src="{{ url('/')}}/admin/js/custom.js"></script>
    <script src="{{ url('/')}}/admin/js/moment.min.js"></script>
    <script src="{{ url('/')}}/admin/js/calendar/fullcalendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.14/moment-timezone-with-data.min.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function () {
                var oTable = $('.list-table').dataTable({
                    "oLanguage": {
                        "sSearch": "Search all columns:"
                    },
           
                    "order": [],
                    "columnDefs": [ {
                      "targets"  : 'no-sort',
                      "orderable": false,
                      "order": []
                    }],
                    'iDisplayLength': 12,
                    "sPaginationType": "full_numbers",
                    
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

        function updateClock ( )
            {
            // var currentTime = new Date ( );
            
            $('ul.time-zone li').each( function(index, timeZone){
                var time_zone_str = $(timeZone).attr('time-zone'); 
                
                var time_str = $(timeZone).find('span.clock').attr('time-value'); 

                var currentTime = new moment( time_str , 'HH:mm:ss').add(1,'seconds');
                $(timeZone).find('span.clock').attr('time-value', moment(currentTime).format('H:mm:ss'));
                $(timeZone).find('span.clock').html(moment(currentTime).format('h:mm A'));
              });
                  
           }

          jQuery(document).ready(function($)
          {
             
             setInterval('updateClock()', 1000);            

          });
          
          // var position = $(window).scrollTop(); 

          $(window).scroll(function() {
              var scroll = $(window).scrollTop();
              if (scroll > 0) {
                $('.nav_menu').addClass('fixed-top');
                // console.log("scrolling downwards");
              } else {
                // console.log("scrolling upwards");
                $('.nav_menu').removeClass('fixed-top');
              }

              // position = scroll;
            });
     $(".cancel-form-class").on("submit", function(){
        return confirm("Do you want to delete this Class?");
    });


    </script>
    <!-- /datepicker -->
    <!-- /footer content -->
</body>

</html>
