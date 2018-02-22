@extends('layouts.admin.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Add News <small>This is a news form</small></h2>
                        
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        
                        @if(isset($action) && ($action == 'edit'))
                        {!! Form::open(array('action' => ['Admin\AdminNewsController@update', $news->id], 'method'=> 'PUT', 'id' => 'frm-news', 'class' => 'form-horizontal form-label-left', 'novalidate' => '', 'data-parsley-validate' => '')) !!}
                        @else
                        {!! Form::open(array('action' => 'Admin\AdminNewsController@store', 'id' => 'frm-news', 'class' => 'form-horizontal form-label-left', 'novalidate' => '', 'data-parsley-validate' => '')) !!}
                        @endif
                        <!-- Account Information -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Display Option <span class="required">*</span>
                                </label>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <select id="display-option" name="display-option" required="required" class="form-control col-md-7 col-xs-12" value="{{ isset( $news->title )? $news->title : '' }}">
                                        <option value="0">All</option>
                                        <option value="1">Student Only</option>
                                        <option value="2">Teacher Only</option>
                                        <option value="3">Agent Only</option>
                                    </select>
                                
                                </div>
                                <label class="control-label col-md-2 col-sm-2 col-xs-2" for="username">Active
                                </label>
                                <div class="col-md-2 col-sm-2 col-xs-12">
                                
                                    <input type="checkbox" name="active" required="required" class="green-ckeck" {{ (isset( $news->status ) && ( $news->status == 'Active'))? 'checked="checked"' : '' }} >
                                    <!-- <input type="radio" name="status" required="required" class="form-control col-md-7 col-xs-12"> -->

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Title<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="title" name="title" required="required" class="form-control col-md-7 col-xs-12" value="{{ isset( $news->title )? $news->title : '' }}">
                                
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="firstname">Content <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea name="content" id="content" required="required" class="form-control col-md-7 col-xs-12" >{{ isset( $news->content )? $news->content : '' }}</textarea>
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
