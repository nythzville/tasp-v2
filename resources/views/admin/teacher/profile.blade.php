@extends('layouts.admin.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Teacher {{ $teacher->firstname }}'<s></s> Profile <small></small></h2>
                        
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        <div class="col-md-3 col-sm-3 col-xs-12 profile_left">

                            <div class="profile_img">

                                <!-- end of image cropping -->
                                <div id="crop-avatar">
                                    <!-- Current avatar -->
                                    <div class="avatar-view" title="{{ $teacher->lastname }} {{ $teacher->firstname }} Profile">
                                        
                                        @if($teacher->getUser->user_image == null)
                                            @if($teacher->gender == 'male')
                                                <img src="{{ url('/') }}/admin/images/boy-avatar.png" alt="">
                                            @elseif($teacher->gender == 'female')
                                                <img src="{{ url('/') }}/admin/images/girl-avatar.png" alt="">
                                            @endif
                                        @else
                                        <img src="{{url($teacher->getUser->user_image)}}" alt="Avatar">
                                        @endif
                                    </div>

                                    <!-- Cropping modal -->
                                    <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <form class="avatar-form" action="{{ url('admin/teacher/'.$teacher->id.'/crop_image') }}" enctype="multipart/form-data" method="post">
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
                            <h3>Teacher {{ $teacher->firstname }}</h3>

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
                                <li>
                                    <i class="fa fa-phone user-profile-icon"></i> <strong>QQ :</strong> {{ $teacher->qq }}
                                </li>

                                
                            </ul>
                            <hr>
                            <ul class="list-unstyled user_data">
                                <li>
                                    <i class="fa fa-calendar user-profile-icon"></i> <strong>Regular Classes:</strong> {{ $teacher->getRegularClassesCount() }}
                                </li>
                                <li>
                                    <i class="fa fa-calendar user-profile-icon"></i> <strong>Trial Classes:</strong> {{ $teacher->getTrialClassesCount() }}
                                </li>
                                <li>
                                    
                                    <a class="btn btn-default btn-xs" href="{{ url('admin/teachers/'. $teacher->id. '/edit' ) }}"><i class="fa fa-edit user-profile-icon"></i>  Edit Teacher</a>
                                </li>
                                <li>
                                     
                                    {!! Form::open(array('action'=>['Admin\AdminTeacherController@destroy', $teacher->id ], 'method' => 'DELETE', 'class' => 'delete-form')) !!}
                                    <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-close user-profile-icon"></i> Delete Teacher</button>
                                    {!! Form::close() !!}
                                </li>
                            </ul>
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
                                
                                    <li role="presentation" class="active"><a href="#about" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">About This Teacher</a>
                                    </li>
                                    <li role="presentation" class=""><a href="#all-classes" id="all-classes-tab" role="tab" data-toggle="tab" aria-expanded="true">All Classes</a>
                                    </li>
                                   
                                    <li role="presentation" class=""><a href="#completed-classes" role="tab" id="completed-classes-tab" data-toggle="tab" aria-expanded="false">Completed Classes</a>
                                    </li>
                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    
                                    <div role="tabpanel" class="tab-pane fade active in" id="about" aria-labelledby="home-tab">
                                        <h2>About Yourself <small></small></h2>
                                        
                                        <div class="clearfix"></div>
                                   

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
                                                        {!! Form::open(array('url'=> 'admin/teachers/'.$teacher->id.'/edit_desc', 'method' => 'POST', 'class' => 'form-horizontal form-label-left')) !!}

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
                                                    {!! Form::open(array('url'=> 'admin/teachers'./$teacher->id.'/recording', 'method' => 'POST', 'enctype'=>'multipart/form-data', 'class' => 'form-horizontal form-label-left')) !!}
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

                                        <div role="tabpanel" class="tab-pane fade" id="all-classes" aria-labelledby="profile-tab">
                                        <table class="table ">
                                            <thead>
                                                <tr class="headings">
                                                   
                                                    <th class="column-title">Time</th> 
                                                    <th class="column-title">Student </th>
                                                    <th class="column-title">Type </th>

                                                    <th class="column-title">Status </th>
                                                    
                                                </tr>
                                            </thead>

                                            <tbody>
                                            @if(isset($classes))

                                            @foreach($classes as $class)
                                            <tr class="pointer">
                                                <td class=" "> {{ date("m/d/Y H:i a",strtotime($class->start)) }}</td>
                                                <td class=" "><a href="{{ url('/admin/student/'. $class->getStudent->id ) }}" >{{ $class->getStudent->lastname }} {{ $class->getStudent->firstname }}</a></td>
                                                <td class=" ">{{ $class->type }}</td>
                                                <td class=" ">{{ $class->status }}</td>
                                                
                                                
                                            </tr>
                                            @endforeach
                                        @endif
                                        </tbody>

                                    </table>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="completed-classes" aria-labelledby="home-tab">
                                        <table class="table ">
                                            <thead>
                                                <tr class="headings">
                                                   
                                                    <th class="column-title">Time</th> 
                                                    <th class="column-title">Student </th>
                                                    <th class="column-title">Status </th>
                                                    <th class="column-title no-link last"><span class="nobr">Action</span>
                                                    </th>
                                                    <th class="bulk-actions" colspan="7">
                                                      
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                            @if(isset($completed_classes))

                                            @foreach($completed_classes as $class)
                                            <tr class="pointer">
                                                <td class=" "> {{ date("m/d/Y H:i a",strtotime($class->start)) }}</td>
                                                <td class=" "><a href="{{ url('/admin/student/'. $class->getStudent->id ) }}" >{{ $class->getStudent->lastname }} {{ $class->getStudent->firstname }}</a></td>
                                                <td class=" ">{{ $class->status }}</td>
                                                <td class=" ">
                                                    @if($class->status == "COMPLETED" )
                                                    <a  class="btn-view-evaluation btn btn-success btn-xs" class-id="{{$class->id}}"><i class="fa fa-eye"></i> Evaluation</a>
                                                    @endif
                                                </td>
                                                
                                            </tr>
                                            @endforeach
                                        @endif
                                        </tbody>

                                    </table>
                                                                      

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
                    {{ Form::open( array( 'url' => 'admin/teachers/profile/'.$teacher->id , 'method' => 'PUT','id' => 'frm-teacher', 'class' => 'form-horizontal form-label-left', 'novalidate' => '') ) }}
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
