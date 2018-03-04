@extends('layouts.student.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Teacher {{ $teacher->firstname }}'s Profile <small></small></h2>
                        
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        <div class="col-md-3 col-sm-3 col-xs-12 profile_left">

                            <div class="profile_img">

                                <!-- end of image cropping -->
                                <div id="crop-avatar">
                                    <!-- Current avatar -->
                                    <div class="avatar-view" title="{{ $teacher->lastname }} {{ $teacher->firstname }} Profile">
                                        <img src="{{url($teacher->getUser->user_image)}}" alt="Avatar">
                                    </div>

                                    

                                    <!-- Loading state -->
                                    <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
                                </div>
                                <!-- end of image cropping -->

                            </div>
                            <h3>Teacher {{ $teacher->firstname }}</h3>

                            <ul class="list-unstyled user_data">
                                <li><i class="fa fa-user user-profile-icon"></i> <strong>Age:</strong> {{  date_diff(date_create($teacher->dob), date_create('now'))->y }}
                                </li>

                                <li>
                                    <i class="fa fa-user user-profile-icon"></i> <strong>Gender :</strong> {{ $teacher->gender }}
                                </li>

                                <li>
                                    <i class="fa fa-skype user-profile-icon"></i> <strong>Skype :</strong> {{ $teacher->skype }}
                                    
                                </li>
                                <li>
                                    <i class="fa fa-phone user-profile-icon"></i> <strong>QQ :</strong> {{ $teacher->qq }}
                                    
                                </li>
                            </ul>
                            <hr>
                            <h4>Classes with this Teacher</h4>
                            <ul class="list-unstyled user_data">
                                <li>
                                    <i class="fa fa-calendar user-profile-icon"></i> <strong>Regular:</strong> {{ $teacher->getRegularClassesCountByStudentId($student->id) }}
                                </li>
                                <li>
                                    <i class="fa fa-calendar user-profile-icon"></i> <strong>Trial:</strong> {{ $teacher->getTrialClassesCountByStudentId($student->id) }}
                                </li>
                                <li>

                                    <a href="{{ url('student/book/teacher/'.$teacher->id.'') }}" class="btn btn-success btn-xs"> <i class="fa fa-book">
                                            </i> Book A Class</a>
                                </li>
                            </ul>
                          
                            <br />

                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-12">

                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                
                                    <li role="presentation" class="active"><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">About This Teacher</a>
                                    </li>
                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    
                                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content2" aria-labelledby="home-tab">
                                        <div class="x_title">
                                            <h2>About Teacher <small></small></h2>
                                            
                                            <div class="clearfix"></div>
                                        </div>

                                        <div class="x_content">
                                            <div class="row">
                                                <div class="col-xs-12">

                                                    <div id="display-desc" class="col-md-6">
                                                        <p>{{ $teacher->desc }}
                                                        </p>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div id="sound-recording">
                                                        <h4>Recording</h4>
                                                        <audio controls="">
                                                              <source src="{{ url('/recordings/'.$teacher->id.'-'.strtolower($teacher->firstname).'-recording.mp3') }}" type="audio/mpeg">
                                                            Your browser does not support the audio element.
                                                        </audio>
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-md-6">
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
   
@endsection
