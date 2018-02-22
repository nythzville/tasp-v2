@extends('layouts.teacher.app')

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
                                        @if($user->user_image == null)
                                            @if($teacher->gender == 'male')
                                                <img src="{{ url('/') }}/admin/images/boy-avatar.png" alt="">
                                            @elseif($teacher->gender == 'female')
                                                <img src="{{ url('/') }}/admin/images/girl-avatar.png" alt="">
                                            @endif
                                        @else
                                        <img src="{{url($user->user_image)}}" alt="Avatar">
                                        @endif
                                    </div>

                                    <!-- Cropping modal -->
                                    <!-- <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <form class="avatar-form" action="{{ url('teacher/crop_image') }}" enctype="multipart/form-data" method="post">
                                                    {{ Form::token() }}
                                                    <div class="modal-header">
                                                        <button class="close" data-dismiss="modal" type="button">&times;</button>
                                                        <h4 class="modal-title" id="avatar-modal-label">Change Porfile Image</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="avatar-body">

                                                            <!-- Upload image and data -->
                                                            <!--<div class="avatar-upload">
                                                                <input class="avatar-src" name="avatar_src" type="hidden">
                                                                <input class="avatar-data" name="avatar_data" type="hidden">
                                                                <label for="avatarInput">Local upload</label>
                                                                <input class="avatar-input" id="avatarInput" name="avatar_file" type="file">
                                                            </div>

                                                            <!-- Crop and preview -->
                                                            <!-- <div class="row">
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
                                                    </div> -->
                                                    <!-- <div class="modal-footer">
                                      <button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
                                    </div> -->
                                       <!--          </form>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- /.modal -->

                                    <!-- Loading state -->
                                    <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
                                </div>
                                <!-- end of image cropping -->

                            </div>
                            <h3>{{ $teacher->lastname }}, {{ $teacher->firstname }}</h3>

                            <ul class="list-unstyled user_data">
                                <li><i class="fa fa-user user-profile-icon"></i> <strong>Birth Date :</strong> {{ date("M j, Y", strtotime($teacher->dob)) }}
                                </li>
                                <li><i class="fa fa-user user-profile-icon"></i> <strong>Age :</strong> {{ date_diff(date_create($teacher->dob), date_create('now'))->y }} years old
                                <li>
                                    <i class="fa fa-user user-profile-icon"></i> <strong>Gender :</strong> {{ $teacher->gender }}
                                </li>

                                <li>
                                    <i class="fa fa-skype user-profile-icon"></i> <strong>Skype :</strong> {{ $teacher->skype }}
                                    
                                </li>
                            </ul>
                            <hr>
                            <h4>Completed Classes</h4>
                            <ul class="list-unstyled user_data">
                                <li>
                                    <i class="fa fa-calendar user-profile-icon"></i> <strong>Regular:</strong> {{ $teacher->getRegularClassesCount() }}
                                </li>
                                <li>
                                    <i class="fa fa-calendar user-profile-icon"></i> <strong>Trial:</strong> {{ $teacher->getTrialClassesCount() }}
                                </li>
                               
                            </ul>
                            <br />

                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            @if(session('success'))
                                <div class="alert alert-success">
                                <ul>
                                    <li>{{session('success')}}</li>
                                </ul>
                                </div>
                            @endif
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#tab_content1" role="tab" id="about-tab" data-toggle="tab" aria-expanded="false">About Yourself</a>
                                    </li>
                                    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="schedule-tab" data-toggle="tab" aria-expanded="false">Today's Schedule</a>
                                    </li>
                                    
                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    
                                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="about-tab">

                                        <h2>About Yourself <small></small></h2>    
                                        <div class="x_content">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                
                                                    <div id="display-desc" class="col-md-6">
                                                        <p>{{ $teacher->desc }}
                                                        </p>
                                                        <button id="edit-desc" class="btn btn-default"><i class="fa fa-edit"></i> Edit</button>   
                                                    </div>
                                                    <script type="text/javascript">
                                                    $(document).ready(function(){
                                                        $('#edit-desc').click(function(){
                                                            $('#desc-form').show();
                                                            $('#display-desc').hide();

                                                        });

                                                        $('#cancel-edit-desc').click(function(){
                                                            $('#display-desc').show();
                                                            console.log('cancel Edit');
                                                            $('#desc-form').hide();
                                                        });
                                                    });
                                                    </script>
                                                    <div id="desc-form" style="display: none;">
                                                        {!! Form::open(array('url'=> 'teacher/edit_desc', 'method' => 'POST', 'class' => 'form-horizontal form-label-left')) !!}

                                                        <div class="form-group">
                                                            
                                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                                <textarea id="desc" name="desc" required="required" class="form-control col-md-7 col-xs-12" rows="8">{{ isset( $teacher->id )? $teacher->desc : '' }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="ln_solid"></div>
                                                        <div class="form-group">
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <button id="cancel-edit-desc" type="button" class="btn btn-default">Cancel</button>
                                                                <button id="submit-desc" type="submit" class="btn btn-success">Submit</button>
                                                            </div>
                                                        </div>
                                                        {!! Form::close()!!}
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
                                                    <h4>Upload Recording</h4>
                                                    {!! Form::open(array('url'=> 'teacher/recording', 'method' => 'POST', 'enctype'=>'multipart/form-data', 'class' => 'form-horizontal form-label-left')) !!}
                                                        <div class="form-group">
                                                            <div class="col-md-8">
                                                                <input type="file" name="recording" required="required" class="form-control col-md-12" accept=".mp3">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-8">
                                                                <input type="submit" name="submit" class="btn btn-success">
                                                            </div>
                                                        </div>
                                                    {!! Form::close()!!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="home-tab">

                                        <!-- start user projects -->
                                        <table class="data table table-striped no-margin">
                                            <thead>
                                                <tr>
                                                    <th>Time</th>
                                                    <th>Student</th>
                                                    <!-- <th>Action</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($classes_today as $class)
                                                <tr>
                                                    <td class=" "> {{ date("m/d/Y H:i a",strtotime($class->start)) }}</td>
                                                    <td class=" ">{{ $class->getStudent->lastname }} {{ $class->getStudent->firstname }}</td>
                                                    <!-- <td><a href="{{ url('teacher/clas') }}"> Go to Classes </a></td> -->
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
                    {{ Form::open( array( 'url' => 'teacher/profile/'.$teacher->id , 'method' => 'PUT','id' => 'frm-teacher', 'class' => 'form-horizontal form-label-left', 'novalidate' => '') ) }}
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Last Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="lastname" name="lastname" required="required" class="form-control col-md-7 col-xs-12" value="{{ isset( $teacher->id )? $teacher->lastname : '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="firstname">First Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="firstname" name="firstname" required="required" class="form-control col-md-7 col-xs-12" value="{{ isset( $teacher->id )? $teacher->firstname : '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dob">Date of Birth<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="date" id="dob" name="dob" required="required" class="form-control col-md-7 col-xs-12" value="{{ isset( $teacher->id )? $teacher->dob : '' }}">
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
