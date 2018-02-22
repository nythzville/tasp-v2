@extends('layouts.admin.app')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>User List <small>Active Users</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">

                    <p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p>

                    <table class="table list-table table-striped responsive-utilities jambo_table bulk_action">
                        <thead>
                            <tr class="headings">
                                <th>
                                    <input type="checkbox" id="check-all" class="flat">
                                </th>
                                <th class="column-title">Name </th>
                                <th class="column-title">Email</th>
                                <th class="column-title">User Type </th>
                                <th class="column-title no-link last"><span class="nobr">Action</span>
                                </th>
                                <th class="bulk-actions" colspan="7">
                                    <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($users as $user)
                            <tr class="even pointer">
                                <td class="a-center "><input type="checkbox" class="flat" name="table_records" ></td>
                                <td class=" ">{{ $user->name }}</td>
                                <td class=" ">{{ $user->email }}</td>
                                <td class=" ">{{ $user->user_type }}</td>
                                <td class=" ">
                                    
                                    <a class="btn btn-xs btn-success">View</a>

                                    {!! Form::open(array('url'=> 'admin/user/'.$user->id, 'method' => 'DELETE', 'style'=> 'display:inline;')) !!}
                                        <button type="submit" class="btn btn-xs btn-error">Delete</button>
                                    {!! Form::close() !!}
                                </td>
                                    
                                </td>
                            </tr>
                            @endforeach
                                       
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <!-- /page content -->

@endsection
