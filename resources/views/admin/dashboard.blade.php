@extends('layouts.admin.app')

@section('content')

            <!-- page content -->
            <div class="right_col" role="main">

                <!-- top tiles -->
                <div class="row tile_count">
                    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
                            <span class="count_top"><i class="fa fa-users"></i> Total Students</span>
                            <div class="count">{{ $student_count }}</div>
                        </div>
                    </div>
                    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
                            <span class="count_top"><i class="fa fa-users"></i> Total Teachers</span>
                            <div class="count">{{ $teacher_count }}</div>
                            
                        </div>
                    </div>
                    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
                            <span class="count_top"><i class="fa fa-users"></i> Total Agents</span>
                            <div class="count green">{{ $agent_count }}</div>
                            
                        </div>
                    </div>
                    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
                            <span class="count_top"><i class="fa fa-calendar"></i> Total Classes</span>
                            <div class="count">{{ $classes_count }}</div>
                            
                        </div>
                    </div>
                    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
                            <span class="count_top"><i class="fa fa-calendar"></i> Completed Classes</span>
                            <div class="count">{{ $completed_classes_count }}</div>
                            
                        </div>
                    </div>
                    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
                            <span class="count_top"><i class="fa fa-calendar"></i> Booked Classes</span>
                            <div class="count">{{ $booked_classes_count }}</div>
                            
                        </div>
                    </div>

                </div>
                <!-- /top tiles -->

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                                <div class="x_title">
                                    <h2>Classes Summary <small>Weekly progress</small></h2>
                                    <div class="filter">
                                        <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                                            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                            <span>December 30, 2017 - January 28, 2018</span> <b class="caret"></b>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="col-md-9 col-sm-12 col-xs-12">
                                        <div class="demo-container" style="height:280px">
                                            <div id="placeholder33x" class="demo-placeholder"></div>
                                        </div>
                                        <div class="tiles">
                                            <div class="col-md-4 tile">
                                                <span>Total Students</span>
                                                <h2>{{ $student_count }}</h2>
                                                <span class="sparkline11 graph" style="height: 160px;">
                                        <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                    </span>
                                            </div>
                                            <div class="col-md-4 tile">
                                                <span>Total Classes Booked</span>
                                                <h2>{{ $booked_classes_count }}</h2>
                                                <span class="sparkline22 graph" style="height: 160px;">
                                        <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                    </span>
                                            </div>
                                            <div class="col-md-4 tile">
                                                <span>Total CLasses Completed</span>
                                                <h2>{{ $completed_classes_count }}</h2>
                                                <span class="sparkline11 graph" style="height: 160px;">
                                        <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                    </span>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                        <div>
                                            <div class="x_title">
                                                <h2>Top Students</h2>
                                                <ul class="nav navbar-right panel_toolbox">
                                                    
                                                </ul>
                                                <div class="clearfix"></div>
                                            </div>
                                            <ul class="list-unstyled top_profiles scroll-view">
                                                @if(isset($students) && (count($students) > 0))
                                                @foreach($students as $student)
                                                <li class="media event">
                                                    <a class="pull-left border-aero profile_thumb">
                                                        <i class="fa fa-user aero"></i>
                                                    </a>
                                                    <div class="media-body">
                                                        <a class="title" href="#">{{ $student->lastname }} {{ $student->firstname }}</a>
                                                        <p>Agent: <strong>{{ $student->getAgent->firstname }}</strong></p>
                                                        <p> <small>{{ $student->getTotalCompletedClasses() }} Completed Classes</small>
                                                        </p>
                                                    </div>
                                                </li>
                                                @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                    </div>

                                </div>

                            <div class="clearfix"></div>
                        </div>
                    </div>

                </div>
                <div class="row">
                        <div class="col-md-4">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Top Teachers <small>Ranking</small></h2>
                                    
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    @if(isset($rankings))
                                    @foreach($rankings as $rank)
                                    <article class="media event">
                                        <a class="pull-left date">
                                            <p class="">#{{ $rank->rank }}</p>
                                        </a>
                                        <div class="media-body">
                                            <a class="title" href="#">{{ $rank->getTeacher->lastname }} {{ $rank->getTeacher->firstname }}</a>
                                            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
                                        </div>
                                    </article>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>                
                <br />

                <!-- footer content -->
            </div>
            <!-- /page content -->

    @endsection
