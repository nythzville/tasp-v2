@extends('layouts.agent.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Student List <small></small></h2>
                        
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        <table class="table table-striped responsive-utilities jambo_table bulk_action">
                            <thead>
                                <tr class="headings">
                                    <th>
                                        <input type="checkbox" id="check-all" class="flat">
                                    </th>
                                    <th class="column-title">Name </th>
                                    <th class="column-title">Date of Birth / Age </th>
                                    <th class="column-title">Available Class</th>
                                    <th class="column-title">Completed Classes</th>
                                    <th class="column-title no-link last"><span class="nobr">Action</span>
                                    </th>
                                    <th class="bulk-actions" colspan="7">
                                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                </th>
                    
                    </tr>
                    </thead>

                    <tbody>
                    @if(isset($students))

                        @foreach($students as $student)
                        <tr class="even pointer">
                            <td class="a-center "><input type="checkbox" class="flat" name="table_records" ></td>
                            <td class=" ">{{ $student->lastname.' '. $student->firstname }}</td>
                            <td class=" ">{{ date("M j, Y", strtotime($student->dob)) }} / {{ date_diff(date_create($student->dob), date_create('now'))->y }} years old</td>
                            <td class=" ">{{ $student->available_class}} </i></td>
                            <td class="">{{ $student->getTotalCompletedClasses() }} </td>
                            <!-- <td class=" ">{{ date("F j, Y g:i a",strtotime($student->getTrialClass['start'])) }}</td> -->
                            <td class=" last">
                                <a href="{{ url('agent/student/'. $student->id . '/book') }}" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Book a Class</a>

                                <a href="{{ url('agent/student/'. $student->id . '') }}" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> View</a>
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
