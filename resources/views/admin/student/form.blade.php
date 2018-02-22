@extends('layouts.admin.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">

                        @if($action != 'edit')
                        <h2>New Student Application <small>This is a new student form</small></h2>
                        @else
                        <h2>Edit Student <small>Editing student with id [ {{$student->id}} ] </small></h2>
                        @endif
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        @if($action == 'edit')
                        {!! Form::open(array('url' => 'admin/student/'.$student->id, 'method' => 'PUT', 'id' => 'frm-student', 'class' => 'form-horizontal form-label-left', 'novalidate' => '', 'data-parsley-validate' => '')) !!}
                        @else
                        {!! Form::open(array('action' => 'Admin\AdminStudentController@store', 'id' => 'frm-student', 'class' => 'form-horizontal form-label-left', 'novalidate' => '', 'data-parsley-validate' => '')) !!}
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

                            <!-- Account Information -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Username<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="username" name="username" required="required" class="form-control col-md-7 col-xs-12" value="{{ isset( $student->user->id )? $student->user->name : old('username') }}">
                                
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="firstname">Email <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12" value="{{ isset( $student->user->id )? $student->user->email : old('email') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Password <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="password" id="password" name="password" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password_confirmation">Re-type Password <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="password" id="password_confirmation" name="password_confirmation" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <!-- \ Account Information -->
                            <div class="ln_solid"></div>
                            <!-- \ Student Personal Information -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Student ID <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="student_id" name="student_id" required="required" class="form-control col-md-7 col-xs-12" value="{{ isset( $student->student_id )? $student->student_id : old('student_id') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Last Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="lastname" name="lastname" required="required" class="form-control col-md-7 col-xs-12" value="{{ isset( $student->id )? $student->lastname : old('lastname') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="firstname">First Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="firstname" name="firstname" required="required" class="form-control col-md-7 col-xs-12" value="{{ isset( $student->id )? $student->firstname : old('firstname') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div id="gender" class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                            <input type="radio" name="gender" value="male" data-parsley-multiple="gender" data-parsley-id="7517"> &nbsp; Male &nbsp;
                                        </label><ul class="parsley-errors-list" id="parsley-id-multiple-gender"></ul>
                                        <label class="btn btn-primary active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                            <input type="radio" name="gender" value="female" checked="" data-parsley-multiple="gender" data-parsley-id="7517"> Female
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="birthday" name="dob" class="date-picker form-control col-md-7 col-xs-12" required="required" type="date" value="{{ isset( $student->id )? date('Y-m-d', strtotime($student->dob)) : date('Y-m-d', strtotime(old('dob'))) }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="skype-id">Skype ID <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="skype-id" name="skype-id" required="required" class="form-control col-md-7 col-xs-12" value="{{ isset( $student->skype )? $student->skype : old('skype-id') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="qq-id">QQ ID <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="qq-id" name="qq-id" required="required" class="form-control col-md-7 col-xs-12" value="{{ isset( $student->qq )? $student->qq : old('qq-id') }}">
                                </div>
                            </div>


                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary">Cancel</button>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        

@endsection
