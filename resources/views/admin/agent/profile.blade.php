@extends('layouts.admin.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Agent Profile <small></small></h2>
                        
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        <div class="col-md-3 col-sm-3 col-xs-12 profile_left">

                            <div class="profile_img">

                                <!-- end of image cropping -->
                                <div id="crop-avatar">
                                    <!-- Current avatar -->
                                    <div class="avatar-view" title="Change the avatar">
                                        @if($agent->getUser->user_image == null)
                                            @if($agent->gender == 'male')
                                                <img src="{{ url('/') }}/admin/images/boy-avatar.png" alt="">
                                            @elseif($agent->gender == 'female')
                                                <img src="{{ url('/') }}/admin/images/girl-avatar.png" alt="">
                                            @endif
                                        @else
                                        <img src="{{url($agent->getUser->user_image)}}" alt="Avatar">
                                        @endif
                                    </div>
                                    <!-- Cropping modal -->
                                    <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <form class="avatar-form" action="{{ url('admin/agents/'.$agent->id.'/crop_image') }}" enctype="multipart/form-data" method="post">
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
                            <h3>{{ $agent->lastname }}, {{ $agent->firstname }}</h3>

                            <ul class="list-unstyled user_data">
                                <li><i class="fa fa-user user-profile-icon"></i> <strong>Birth Date :</strong> {{ date("M j, Y", strtotime($agent->dob)) }}
                                </li>
                                <li><i class="fa fa-user user-profile-icon"></i> <strong>Age :</strong> {{ date_diff(date_create($agent->dob), date_create('now'))->y }} years old
                                <li>
                                    <i class="fa fa-user user-profile-icon"></i> <strong>Gender :</strong> {{ $agent->gender }}
                                </li>

                                <li>
                                    <i class="fa fa-skype user-profile-icon"></i> <strong>Skype :</strong> {{ $agent->skype }}
                                    
                                </li>

                                <li>
                                    <i class="fa fa-user user-profile-icon"></i> <strong>Student:</strong> {{ count($students) }}
                                    
                                </li>
                                <li>
                                    
                                    <a class="btn btn-default btn-xs" href="{{ url('admin/agents/'. $agent->id. '/edit' ) }}"><i class="fa fa-edit user-profile-icon"></i>  Edit Agent</a>
                                </li>
                                <li>
                                     

                                    {!! Form::open(array('action'=>['Admin\AdminAgentController@destroy', $agent->id ], 'method' => 'DELETE', 'class' => 'delete-form')) !!}
                                    <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-close user-profile-icon"></i> Delete Agent</button>
                                    {!! Form::close() !!}
                                </li>
                            </ul>

                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-12">

                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Students</a>
                                    </li>
                                   
                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="profile-tab">
                                        <table class="table table-striped responsive-utilities ">
                                            <thead>
                                                <tr class="headings">
                                                    
                                                    <th class="column-title">Name </th>
                                                    <th class="column-title">Date of Birth / Age </th>
                                                    <th class="column-title">Available Class</th>
                                                    <th class="column-title">Completed Classes</th>
                                                    
                                    
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @if(isset($students))

                                                @foreach($students as $student)
                                                <tr class="even pointer">
                                                    <td class=" "><a href="{{ url('admin/student/'.$student->id) }}">{{ $student->lastname.' '. $student->firstname }}</a></td>
                                                    <td class=" ">{{ date("M j, Y", strtotime($student->dob)) }} / {{ date_diff(date_create($student->dob), date_create('now'))->y }} years old</td>
                                                    <td class=" ">{{ $student->available_class}} class </i></td>
                                                    <td class="">{{ $student->getTotalCompletedClasses() }} class</td>
                                                   
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
       <!-- image cropping -->
    <script src="{{ url('/admin') }}/js/cropping/cropper.min.js"></script>
    <script src="{{ url('/admin') }}/js/cropping/main.js"></script>
@endsection
