<!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

        <div class="menu_section">
            <h3>Student</h3>
            <ul class="nav side-menu">
                
                
                <li><a><i class="fa fa-calendar"></i> Classes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: none">
                        <li><a href="{{ url('/student/classes/today') }}"> Today's Classes</a></li>
                        <li><a href="{{ url('/student/classes/completed') }}">Completed Classes</a></li>                    
                        <li><a href="{{ url('/student/classes') }}">All</a>
                        </li>
                    </ul>
                </li>

                <li><a><i class="fa fa-users"></i> Book a Class <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: none">
                        <li><a href="{{ url('/student/book') }}">by Date</a>
                        
                        <!-- <li><a href="{{ url('/student/book/time') }}">by Time</a> -->
                        </li>

                        <li><a href="{{ url('/student/teachers') }}">by Teacher</a>
                            
                        </li>     
                    </ul>
                </li>
                  
               
            </ul>
        </div>
        <div class="menu_section">
            <h3>Bulletin Board</h3>
            <ul class="nav side-menu">
                <li><a href="{{ url('/student/news') }}"><i class="fa fa-info"></i> News </a>
                    
                </li>
            </ul>
        </div>

    </div>
    <!-- /sidebar menu -->

    <!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
        <a data-toggle="tooltip" data-placement="top" title="Settings">
            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Lock">
            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Logout">
            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a>
    </div>
    <!-- /menu footer buttons -->
</div>
</div>

<!-- top navigation -->
<div class="top_nav">

<div class="nav_menu">
    <nav class="" role="navigation">
        <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>

        <ul class="nav navbar-nav navbar-right">
            <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    @if($user->user_image)
                    <img src="{{ url($user->user_image) }}" alt="">
                    @else
                    <img src="{{ url('/admin') }}/images/user.png" alt="">

                    @endif
                    {{ $student->firstname }} {{ $student->lastname }} 
                    <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                    <li><a href="{{ url('student/profile') }}">  Profile</a>
                    </li>
                    
                    <li><a href="{{ url('logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </li>
                </ul>
            </li>
            <!-- Progress Report --> 
            @if(!empty($student->getCourse()->report ))
            
            <li role="presentation" class="dropdown">
                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-check-square-o"></i>
                    <span class="badge bg-green">1</span>
                </a>
                <ul id="progress-report-list" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                    
                    <li>
                        <a href="{{ url('student/progress_report') }}">
                            <span class="image">
                            <img src="{{ url($student->getCourse()->getTeacher()->getUser->user_image) }}" alt="Profile Image" />
                            </span>
                                    <span>
                                        <span>{{ $student->getCourse()->getTeacher()->lastname }} {{ $student->getCourse()->getTeacher()->firstname }}</span>
                                        <span class="time"></span>
                                    </span>
                                    <span class="message"> Have given you a progress report.
                            </span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif
            
            <!--  / Progress Report --> 
            <li role="presentation" class="dropdown">
                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-calendar"></i>
                    <span class="badge bg-green">{{ count($classes_today ) }}</span>
                </a>
                <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                    @foreach($classes_today as $class)
                    <li>
                        <a>
                            <span class="image">
                        <img src="{{ url($class->getTeacher->getUser->user_image ) }}" alt="Profile Image" />
                    </span>
                            <span>
                        <span>{{ $class->getTeacher->lastname }} {{ $class->getTeacher->firstname }}</span>
                            <span class="time">{{ date("g:i a", strtotime( $class->start )) }}</span>
                            </span>
                            <span class="message"> You have a class with this teacher
                    </span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </li>
            <li role="world-time" class="world-time">
                <ul class="time-zone">
                    <li time-zone="Asia/Manila" title="Our Time" style="font-weight: bold;">
                        <strong>Manila:</strong>
                        <span class="clock" time-value="{{ date('H:i:s',strtotime($current_time)) }}">{{ date("g:i:s a",strtotime($current_time)) }}</span>
                       
                    </li>
                    <li time-zone="Asia/Tokyo">
                        Tokyo:
                        <span class="clock" time-value="{{ date('H:i:s',strtotime($tokyo_time)) }}">{{ date("g:i:s a",strtotime($tokyo_time)) }}</span></li>
                    <li time-zone="Asia/Seoul">
                        Seoul: 
                        <span class="clock" time-value="{{ date('H:i:s',strtotime($seoul_time)) }}">{{ date("g:i:s a",strtotime($seoul_time)) }}</span></li>
                    <li time-zone="Asia/Shanghai">
                        Shanghai: 
                        <span class="clock" time-value="{{ date('H:i:s',strtotime($shanghai_time)) }}">{{ date("g:i:s a",strtotime($shanghai_time)) }}</span></li>
                    <li time-zone="Asia/Bangkok">
                        Bangkok: 
                        <span class="clock" time-value="{{ date('H:i:s',strtotime($bangkok_time)) }}">{{ date("g:i:s a",strtotime($bangkok_time)) }}</span></li>

                </ul>
            </li>

        </ul>
    </nav>
</div>

</div>
<!-- /top navigation -->