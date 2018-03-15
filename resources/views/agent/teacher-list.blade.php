@extends('layouts.agent.app')

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

                        <table class="table list-table table-striped responsive-utilities jambo_table bulk_action">
                            <thead>
                                <tr class="headings">
                                    <th>
                                        <input type="checkbox" id="check-all" class="flat">
                                    </th>
                                    <th class="column-title">Name </th>
                                    <th class="column-title">Age </th>
                                    <th class="column-title">Skype ID</th>
                                    <th class="column-title">QQ ID</th>
                                    <th class="column-title">Status </th>
                                    <th class="column-title no-link last"><span class="nobr">Action</span>
                                    </th>
                                    <th class="bulk-actions" colspan="7">
                                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                </th>
                    </tr>
                    </thead>

                    <tbody>
                    @if(isset($teachers))

                        @foreach($teachers as $teacher)
                        <tr class="even pointer">
                            <td class="a-center "><input type="checkbox" class="flat" name="table_records" ></td>
                            <td class=" ">{{ 'Teacher '. $teacher->firstname }}</td>
                            <td class=" ">{{ $teacher->dob }} </td>
                            <td class=" ">{{ $teacher->skype}}</i></td>
                            <td class=" "></td>
                            <td class="a-right a-right ">{{ $teacher->qq}}</td>
                            <td class=" last"><a href="{{ url('agent/teachers/'. $teacher->id . '') }}" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> View</a>
                            
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
