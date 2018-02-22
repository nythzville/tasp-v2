<!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

        <div class="menu_section">
            <h3>AGENT</h3>
            <ul class="nav side-menu">
                <li><a><i class="fa fa-users"></i> Students <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: none">
                        
                        <li><a href="{{ url('/agent/student') }}">All</a>
                        </li>
                        <li><a href="{{ url('/agent/student/create') }}">Add New</a>
                        </li>
                    </ul>
                </li>
                <li><a href="{{ url('/agent/teacher') }}"><i class="fa fa-users"></i> Teachers </a>
                    
                </li>
                <li><a><i class="fa fa-calendar"></i> Classes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: none">
                        
                        <li><a href="{{ url('/agent/class') }}">All</a>
                        </li>
                        <li><a href="{{ url('/agent/class?type=REGULAR') }}">Regular</a>
                        </li>
                        <li><a href="{{ url('/agent/class?type=TRIAL') }}">Trial</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="menu_section">
            <h3>Bulletin Board</h3>
            <ul class="nav side-menu">
                <li><a href="{{ url('/agent/news') }}"><i class="fa fa-info"></i> News </a>
                    
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
                    <img src="{{ url('/')}}/agent/images/img.jpg" alt="">Agent
                    <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                    <li><a href="javascript:;">  Profile</a>
                    </li>
                    
                    <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </li>
                </ul>
            </li>

            <li role="presentation" class="dropdown">
                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                </a>
                <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                    <li>
                        <a>
                            <span class="image">
                        <img src="{{ url('/')}}/agent/images/img.jpg" alt="Profile Image" />
                    </span>
                            <span>
                        <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                            </span>
                            <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where... 
                    </span>
                        </a>
                    </li>
                    <li>
                        <a>
                            <span class="image">
                        <img src="{{ url('/')}}/agent/images/img.jpg" alt="Profile Image" />
                    </span>
                            <span>
                        <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                            </span>
                            <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where... 
                    </span>
                        </a>
                    </li>
                    <li>
                        <a>
                            <span class="image">
                        <img src="{{ url('/')}}/agent/images/img.jpg" alt="Profile Image" />
                    </span>
                            <span>
                        <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                            </span>
                            <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where... 
                    </span>
                        </a>
                    </li>
                    <li>
                        <a>
                            <span class="image">
                        <img src="{{ url('/')}}/agent/images/img.jpg" alt="Profile Image" />
                    </span>
                            <span>
                        <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                            </span>
                            <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where... 
                    </span>
                        </a>
                    </li>
                    <li>
                        <div class="text-center">
                            <a>
                                <strong><a href="inbox.html">See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </li>
                </ul>
            </li>

        </ul>
    </nav>
</div>

</div>
<!-- /top navigation -->