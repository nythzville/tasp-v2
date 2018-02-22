@extends('layouts.admin.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>
                {{ $student->lastname }} {{ $student->firstname }}
                <small>
                    Trial Class
                </small>
            </h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                <button class="btn btn-default" type="button">Go!</button>
            </span>
                    </div>
                </div>
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
                        <div class="col-md-4 col-sm-4 col-xs-12 animated fadeInDown">
                            <div class="well profile_view">
                                <div class="col-sm-12">
                                    <h4 class="brief"><i>Teacher</i></h4>
                                    <div class="left col-xs-7">
                                        <h2>{{ $teacher->lastname }} {{ $teacher->firstname }}</h2>
                                        <p><strong>About: </strong> Teacher / Tutor </p>
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-skype"></i> Skype: </li>
                                            <li><i class="fa fa-phone"></i> QQ: </li>

                                        </ul>
                                    </div>
                                    <div class="right col-xs-5 text-center">
                                        @if($teacher->getUser->user_image)
                                        <img src="{{ url($teacher->getUser->user_image) }}" alt="" class="img-circle img-responsive">
                                        @else
                                        <img src="{{ url('admin/images/user.png') }}" alt="" class="img-circle img-responsive">

                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-12 bottom text-right">
                                   
                                    <div class="col-xs-12 col-sm-6 emphasis">
                                        <a href="{{ url('admin/student/'. $student->id . '/teacher/'.$teacher->id.'/trial_class') }}" class="btn btn-primary btn-xs"> <i class="fa fa-login">
                                            </i> Select teacher </a>
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
