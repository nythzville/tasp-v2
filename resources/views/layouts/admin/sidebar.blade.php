<!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

        <div class="menu_section">
            <h3>ADMIN</h3>
            <ul class="nav side-menu">
                <li><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-home"></i> Dashboard </a>
                    
                </li>
                <li><a><i class="fa fa-users"></i> Students <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: none">
                        
                        <li><a href="{{ url('/admin/student') }}">All</a>
                        </li>
                        <li><a href="{{ url('/admin/student/create') }}">Add New</a>
                        </li>
                    </ul>
                </li>
                <li><a><i class="fa fa-users"></i> Teachers <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: none">
                        <li><a href="{{ url('/admin/teacher/ranking') }}">Ranking</a>
                        
                        <li><a href="{{ url('/admin/teacher') }}">All</a>
                        </li>
                        <li><a href="{{ url('/admin/teacher/create') }}">Add New</a>
                        </li>
                    </ul>
                </li>
                <li><a><i class="fa fa-users"></i> Agents <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: none">
                        
                        <li><a href="{{ url('/admin/agents') }}">All</a>
                        </li>
                        <li><a href="{{ url('/admin/agents/create') }}">Add New</a>
                        </li>
                    </ul>
                </li>
                <li><a><i class="fa fa-calendar"></i> Classes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: none">
                        
                        <li><a href="{{ url('/admin/class') }}">All</a>
                        </li>
                        <li><a href="{{ url('/admin/class?type=REGULAR') }}">Regular</a>
                        </li>
                        <li><a href="{{ url('/admin/class?type=TRIAL') }}">Trial</a>
                        </li>
                    </ul>
                </li>
                <li><a href="{{ url('/admin/reports') }}"><i class="fa fa-bar-chart"></i> Reports</span></a>
                </li>

            </ul>
        </div>
        <div class="menu_section">
            <h3>Bulletin Board</h3>
            <ul class="nav side-menu">
                <li><a><i class="fa fa-info"></i> News <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: none">
                        
                        <li><a href="{{ url('/admin/news') }}">All</a>
                        </li>
                        <li><a href="{{ url('/admin/news/create') }}">Add New</a>
                        </li>
                    </ul>
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

                    <img src="{{ url(Auth::user()->user_image) }}" alt="Admin" class="">Admin
                    <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                    <li><a href="{{ url('admin/profile')}}">  Profile</a>
                   
                    </li>
                    <li>
                       
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="fa fa-sign-out pull-right"></i> Logout</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                        
                    </li>
                </ul>
            </li>

        </ul>
    </nav>
</div>

</div>
<!-- /top navigation