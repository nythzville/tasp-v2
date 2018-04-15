@extends('layouts.student.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>My Profile <small></small></h2>
                        
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        <div class="col-md-3 col-sm-3 col-xs-12 profile_left">

                            <div class="profile_img">

                                <!-- end of image cropping -->
                                <div id="crop-avatar">
                                    <!-- Current avatar -->
                                    <div class="avatar-view" title="Change the avatar">
                                        @if($student->user->user_image == null)
                                            @if($student->gender == 'male')
                                                <img src="{{ url('/') }}/admin/images/boy-avatar.png" alt="">
                                            @elseif($student->gender == 'female')
                                                <img src="{{ url('/') }}/admin/images/girl-avatar.png" alt="">
                                            @endif
                                        @else
                                        <img src="{{url($student->user->user_image)}}" alt="Avatar">
                                        @endif
                                    </div>

                                    <!-- Cropping modal -->
                                    <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <form class="avatar-form" action="{{ url('student/crop_image') }}" enctype="multipart/form-data" method="post">
                                                    {{ Form::token() }}
                                                    <div class="modal-header">
                                                        <button class="close" data-dismiss="modal" type="button">&times;</button>
                                                        <h4 class="modal-title" id="avatar-modal-label">Change Porfile Image</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="avatar-body">

                                                            <!-- Upload image and data -->
                                                            <div class="avatar-upload">
                                                                <input class="avatar-src" name="avatar_src" type="hidden">
                                                                <input class="avatar-data" name="avatar_data" type="hidden">
                                                                <label for="avatarInput">Local upload</label>
                                                                <input class="avatar-input" id="avatarInput" name="avatar_file" type="file">
                                                            </div>

                                                            <!-- Crop and preview -->
                                                            <div class="row">
                                                                <div class="col-md-8">
                                                                    <div class="avatar-wrapper"></div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="avatar-preview preview-lg"></div>
                                                                    <div class="avatar-preview preview-md"></div>
                                                                    <div class="avatar-preview preview-sm"></div>
                                                                </div>
                                                            </div>

                                                            <div class="row avatar-btns">
                                                                
                                                                <div class="col-md-12">
                                                                    <button class="btn btn-primary btn-block avatar-save" type="submit">Done</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="modal-footer">
                                      <button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
                                    </div> -->
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.modal -->

                                    <!-- Loading state -->
                                    <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
                                </div>
                                <!-- end of image cropping -->

                            </div>
                            <h3> {{ $student->firstname }} {{ $student->lastname }}</h3>

                            <ul class="list-unstyled user_data">
                                <li><i class="fa fa-user user-profile-icon"></i> <strong>Birth Date:</strong> {{ date("M j, Y",strtotime($student->dob)) }}
                                </li>

                                <li>
                                    <i class="fa fa-user user-profile-icon"></i> <strong>Gender:</strong> {{ $student->gender }}
                                </li>

                                <li>
                                    <i class="fa fa-skype user-profile-icon"></i> <strong>Skype:</strong> {{ $student->skype }}
                                    
                                </li>
                                <li>
                                    <i class="fa fa-calendar user-profile-icon"></i> <strong>Completed Class:</strong> {{ $completed_class_count }}
                                    
                                </li>
                                <li>
                                    <i class="fa fa-calendar user-profile-icon"></i> <strong>Available Class:</strong> {{ $student->available_class }}
                                    
                                </li>
                            </ul>

                            <ul class="list-unstyled user_data">
                                <li>
                                <a href="{{ url('student/teachers') }}" class="btn btn-success btn-xs"><i class="fa fa-edit m-right-xs"></i> Book a Class</a>
                                </li>
                                
                                </li>
                            </ul>

                            <!-- <a class="btn btn-success" data-toggle="modal" data-target="#profile-modal"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a> -->
                            <br />

                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-12">

                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                
                                    <li role="presentation" class="active"><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Today's Schedule</a>
                                    </li>
                                    
                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    
                                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content2" aria-labelledby="home-tab">

                                        <!-- start user projects -->
                                        <table class="data table table-striped no-margin">
                                            <thead>
                                                <tr>
                                                    <th>Time</th>
                                                    <th>Tutor</th>
                                                    <th>Skype ID</th>
                                                    <th>QQ ID</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($classes_today as $class)
                                                <tr>
                                                    
                                                    <td class=" "> {{ date("m/d/Y H:i a",strtotime($class->start)) }}</td>
                                                    <td class=" ">Teacher {{ $class->getTeacher['firstname'] }}</td>
                                                    <td class=" "> {{ $class->getTeacher['skype'] }}</i></td>
                                                    <td class=" "> {{ $class->getTeacher['qq'] }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <!-- end user projects -->                                       

                                    </div>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Profile modal -->
    <div class="modal fade" id="profile-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                  <h2>Edit Profile</h2>
                </div>
                <div class="modal-body">
                    {{ Form::open( array( 'url' => 'student/profile/'.$student->id , 'method' => 'PUT','id' => 'frm-student', 'class' => 'form-horizontal form-label-left', 'novalidate' => '') ) }}
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Last Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="lastname" name="lastname" required="required" class="form-control col-md-7 col-xs-12" value="{{ isset( $student->id )? $student->lastname : '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="firstname">First Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="firstname" name="firstname" required="required" class="form-control col-md-7 col-xs-12" value="{{ isset( $student->id )? $student->firstname : '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dob">Date of Birth<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="date" id="dob" name="dob" required="required" class="form-control col-md-7 col-xs-12" value="{{ isset( $student->id )? $student->dob : '' }}">
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>            
                
            </div>
        </div>
    </div>
    <!-- /.modal -->
    <!-- image cropping -->
    <script src="{{ url('/admin') }}/js/cropping/cropper.min.js"></script>
    <script src="{{ url('/admin') }}/js/cropping/main.js"></script>

@endsection
