@extends('layouts.admin.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Course List <small>All course</small></h2>
                        
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        <p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p>

                        <table class="table table-striped responsive-utilities jambo_table bulk_action">
                            <thead>
                                <tr class="headings">
                                    <th>
                                        <input type="checkbox" id="check-all" class="flat">
                                    </th>
                                    <th class="column-title">Name </th>
                                    <th class="column-title">Description</th>
                                    <th class="column-title no-link last"><span class="nobr">Action</span>
                                    </th>
                                    <th class="bulk-actions" colspan="7">
                                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                </th>
                    </tr>
                    </thead>

                    <tbody>
                    @if(isset($courses))
 
                        @foreach($courses as $course)
                        <tr class="even pointer">
                            <td class="a-center "><input type="checkbox" class="flat" name="table_records" ></td>
                            <td class=" ">{{ $course->name }}</td>
                            <td class=" ">{{ $course->description }} </td>
                           
                            <td class=" last"><a href="{{ url('admin/course/'. $course->id . '') }}" class="btn btn-success"><i class="fa fa-eye"></i> View</a>
                            <a href="{{ url('admin/course/'. $course->id . '/edit') }}" class="btn btn-default"><i class="fa fa-edit"></i> Edit</a>
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
