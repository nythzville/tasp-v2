@extends('layouts.admin.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Agent From <small>This is a new agent form</small></h2>
                        
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>

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
                        @if(isset($action) && ($action == 'edit'))

                        {!! Form::open(array('action' => ['Admin\AdminAgentController@update', $agent->id], 'method' => 'PUT', 'id' => 'frm-agent', 'class' => 'form-horizontal form-label-left', 'novalidate' => '', 'data-parsley-validate' => '')) !!}
                        
                        @else

                        {!! Form::open(array('action' => 'Admin\AdminAgentController@store', 'id' => 'frm-agent', 'class' => 'form-horizontal form-label-left', 'novalidate' => '', 'data-parsley-validate' => '')) !!}

                        @endif  

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="email" name="email" class="form-control col-md-7 col-xs-12" 
                                    @if(isset($agent->id))
                                        value="{{ $agent->getUser->email }}" readonly=""

                                    @else
                                        value="{{ old('email') }}"

                                    @endif
                                    >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Username <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="username" name="username" required="required" class="form-control col-md-7 col-xs-12"
                                    @if(isset($agent->id))
                                        value="{{ $agent->getUser->name }}" readonly
                                    @else
                                        value="{{ old('username') }}"
                                    @endif
                                    >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Password <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="password" id="password" name="password" required="required" class="form-control col-md-7 col-xs-12" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password_confirmation">Re-type Password <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="password" id="password_confirmation" name="password_confirmation" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="ln_solid"></div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="agent_id">Agent ID <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="agent_id" name="agent_id" required="required" class="form-control col-md-7 col-xs-12"
                                    @if(isset($agent->id))
                                        value="{{ $agent->agent_id }}"
                                    @else
                                        value="{{ old('agent_id') }}"
                                    @endif
                                    >
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Last Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="lastname" name="lastname" required="required" class="form-control col-md-7 col-xs-12"
                                    @if(isset($agent->id))
                                        value="{{ $agent->lastname }}"
                                    @else
                                        value="{{ old('lastname') }}"
                                    @endif
                                    >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="firstname">First Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="firstname" name="firstname" required="required" class="form-control col-md-7 col-xs-12"
                                    @if(isset($agent->id))
                                        value="{{ $agent->firstname }}"
                                    @else
                                        value="{{ old('firstname') }}"
                                    @endif
                                    >
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
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="birthday" name="dob" class="date-picker form-control col-md-7 col-xs-12" type="date"
                                    @if(isset($agent->id))
                                        value="{{ date("Y-m-d", strtotime($agent->dob)) }}"
                                    @else
                                        value="{{ date("Y-m-d", strtotime( old('dob'))) }}"
                                    @endif
                                    >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="skype-id">Skype ID
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="skype-id" name="skype-id" class="form-control col-md-7 col-xs-12" 
                                    @if(isset($agent->id))
                                        value="{{ $agent->skype }}"
                                    @else
                                        value="{{ old('skype-id') }}"
                                    @endif
                                    >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="qq-id">QQ ID
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="qq-id" name="qq-id" class="form-control col-md-7 col-xs-12"
                                    @if(isset($agent->id))
                                        value="{{ $agent->qq }}"
                                    @else
                                        value="{{ old('qq-id') }}"
                                    @endif
                                    >
                                </div>
                            </div>

                            

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a href="{{ url('admin/agents') }}" class="btn btn-primary">Cancel</a>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        

@endsection
