@extends('layouts.admin.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Teacher List <small>All teacher</small></h2>
                        
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
                        <table class="table list-table table-striped responsive-utilities jambo_table bulk_action">
                            <thead>
                                <tr class="headings">
                                    
                                    <th class="column-title">Name </th>
                                    <th class="column-title">Date of Birth | Age </th>
                                    <th class="column-title">Skype ID</th>
                                    <th class="column-title">QQ ID</th>
                                    <th class="column-titlelast last no-sort" width="220"><span class="nobr">Action</span>
                                    </th>
                        </tr>
                    </thead>

                    <tbody>
                    @if(isset($teachers))

                        @foreach($teachers as $teacher)
                        <tr class="even pointer">
                            <td class=" ">{{ 'Teacher '. $teacher->firstname }}</td>
                            <td class=" ">{{ date("m/d/Y", strtotime($teacher->dob)) }} - {{  date_diff(date_create($teacher->dob), date_create('now'))->y }}</td>
                            <td class=" ">{{ $teacher->skype}}</i></td>
                            <td class=" ">{{ $teacher->qq}}</td>
                            <td class=" last">
                            <a href="{{ url('admin/teacher/'. $teacher->id. '/profile') }}" class="btn btn-xs btn-success"><i class="fa fa-user"></i>Profile</a>
                            <a href="{{ url('admin/teacher/'. $teacher->id. '/schedule') }}" class="btn btn-xs btn-default"><i class="fa fa-clock-o"></i>Schedule</a>
                            <a href="{{ url('admin/teacher/'. $teacher->id . '/edit') }}" class="btn btn-xs btn-default"><i class="fa fa-edit"></i> Edit</a>
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
