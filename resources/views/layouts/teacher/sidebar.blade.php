<!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

        <div class="menu_section">
            <h3>Teacher</h3>
            <ul class="nav side-menu">
            
            
           
                <li><a href="{{ url('/teacher/classes/today') }}"><i class="fa fa-calendar"></i> My Classes Today</a>
                </li>
                <li><a href="{{ url('/teacher/classes/upcoming') }}"><i class="fa fa-calendar"></i> Upcoming Classes</a>
                </li>

                <li><a href="{{ url('/teacher/classes/booked') }}"><i class="fa fa-calendar"></i> Booked Classes</a>
                </li>

                <li><a href="{{ url('/teacher/classes/completed') }}"><i class="fa fa-calendar"></i> Completed Classes</a>
                </li>
                <li><a href="{{ url('/teacher/classes') }}"><i class="fa fa-calendar"></i> All My Classes</a>
                </li>

                <li><a href="{{ url('/teacher/schedule') }}"><i class="fa fa-calendar"></i> My Schedule</a>
                </li>
               
            </ul>
        </div>
        <div class="menu_section">
            <h3>Bulletin Board</h3>
            <ul class="nav side-menu">
                <li><a href="{{ url('/teacher/news') }}"><i class="fa fa-info"></i> News </a>
                    
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
                    @if($user->user_image == null)
                        @if($teacher->gender == 'male')
                            <img src="{{ url('/') }}/admin/images/boy-avatar.png" alt="">
                        @elseif($teacher->gender == 'female')
                            <img src="{{ url('/') }}/admin/images/girl-avatar.png" alt="">
                        @endif
                    @else
                        <img src="{{ url($user->user_image) }}" alt="">

                    @endif

                    {{ $teacher->lastname }} {{ $teacher->firstname }}
                    <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                    <li><a href="{{ url('student/profile') }}">  Profile</a>
                    </li>
                    
                    <li>
                         <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="fa fa-sign-out pull-right"></i> Logout</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                        
                    </li>
                </ul>
            </li>
            @if(count($pending_evaluation_classes) > 0)
            <li role="presentation" class="dropdown">
                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-edit"></i>
                    <span class="badge bg-red">{{ count($pending_evaluation_classes) }}</span>
                </a>
                @if($pending_evaluation_classes)
                <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                    @foreach($pending_evaluation_classes as $class)
                    <li class="btn-view-evaluation" class-id="{{$class->id}}" date-value="{{ date("m/d/Y",strtotime($class->start)) }}">
                        <a>
                            <span class="image">
                        <!-- <img src="{{ url('/') }}/admin/images/img.jpg" alt="Profile Image" /> -->
                    </span>
                            <span>
                        <span>{{ date('F j, Y H:i', strtotime($class->start)) }}</span>
                            <span class="time" time-value="{{ $class->end }}"></span>
                            </span>
                            <span class="message">
                            A class on student {{ $class->getStudent->lastname }} {{ $class->getStudent->firstname }} has not been evaluated yet!
                    </span>
                        </a>
                    </li>
                    @endforeach
                </ul>
                @endif
            </li>
            @endif
        </ul>
    </nav>
</div>

</div>
<!-- /top navigation -->