@extends('layouts.admin.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Agent List <small>All agent</small></h2>
                        
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        <p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p>
                        @if(session('success'))
                            <div class="alert alert-success">
                            <ul>
                                <li>{{session('success')}}</li>
                            </ul>
                            </div>
                        @endif
                        <table class="table table-striped responsive-utilities jambo_table bulk_action">
                            <thead>
                                <tr class="headings">
                                    <th>
                                        <input type="checkbox" id="check-all" class="flat">
                                    </th>
                                    <th class="column-title">Name </th>
                                    <th class="column-title">Age </th>
                                    <th class="column-title">Email </th>
                                    <th class="column-title">Skype ID</th>
                                    <th class="column-title">QQ ID</th>
                                    <th class="column-title no-link last"><span class="nobr">Action</span>
                                    </th>
                                    
                    </tr>
                    </thead>

                    <tbody>
                    @if(isset($agents))

                        @foreach($agents as $agent)
                        <tr class="even pointer">
                            <td class="a-center "><input type="checkbox" class="flat" name="table_records" ></td>
                            <td class=" ">{{ $agent->lastname.' '. $agent->firstname }}</td>
                            <td class=" ">{{ $agent->dob }} </td>
                            <td class=" ">{{ $agent->getUser->email}}</td>
                            <td class=" ">{{ $agent->skype}}</i></td>
                            <td class="a-right a-right ">{{ $agent->qq}}</td>
                            <td class=" last"><a href="{{ url('admin/agents/'. $agent->id . '') }}" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> View</a>
                            <a href="{{ url('admin/agents/'. $agent->id . '/edit') }}" class="btn btn-default btn-xs"><i class="fa fa-edit"></i> Edit</a>

                            
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
        
        
@endsection
