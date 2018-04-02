@extends('layouts.agent.app')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>
                {{ $student->lastname }} {{ $student->firstname }}
                <small>
                    Book A Class
                </small>
            </h3>
            </div>

            <div class="title_right">
               
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Select Teacher<small></small></h2>
                        
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <p>Select a <code>Teacher</code> for the trial class of your student.</p>
                       
                    @if(isset($teachers))

                        @foreach($teachers as $teacher)
                        <div class="col-md-2 col-sm-2 col-xs-12 animated fadeInDown">
                            <div class="well profile_view">
                                <div class="col-sm-12">
                                    <h5 class="brief"><i>[ Top #{{ $teacher->rank }} ] Teacher</i></h5>
                                    
                                    <!-- <div class="left col-xs-7"> -->
                                    <div class="left col-xs-12">

                                        <h2> {{ $teacher->firstname }}</h2>
                                        <!-- <p><strong>About: </strong> Teacher / Tutor </p> -->
                                       <!--  <ul class="list-unstyled">
                                            <li><i class="fa fa-skype"></i> Skype: {{ $teacher->skype }}</li>
                                            <li><i class="fa fa-phone"></i> QQ: {{ $teacher->qq }}</li>

                                        </ul> -->
                                    </div>
                                    <!-- <div class="right col-xs-5 text-center"> -->
                                    <div class="right col-xs-12 text-center">

                                        @if($teacher['user_image'])
                                        <div class="img-circle" style="overflow: hidden; padding: 0; width: 100px; height: 100px;">
                                            <img src="{{ url($teacher['user_image']) }}" alt="" class="img-responsive" width="100" height="100">
                                                                                        
                                        </div>
                                        @else
                                        <img src="{{ url('admin/images/user.png') }}" alt="" class="img-circle img-responsive">

                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-12 bottom text-right">
                                    <div class="col-xs-12 col-sm-6 emphasis">
                                        <a href="{{ url('agent/students/'.$student->id.'/teachers/'.$teacher->teacher_id.'/book') }}" class="btn btn-success btn-xs"> <i class="fa fa-book">
                                            </i> Book A Class</a>
                                    <!-- </div>
                                    <div class="col-xs-12 col-sm-6 emphasis"> -->
                                        <a href="{{ url('agent/teachers/'.$teacher->teacher_id) }}" class="btn btn-primary btn-xs"> <i class="fa fa-user">
                                            </i> View Profile </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif

            </div>
        </div>
    </div>
</div>
        
@endsection