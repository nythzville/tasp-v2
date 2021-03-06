@extends('layouts.admin.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Student List <small>All student</small></h2>
                        
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
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
                                    
                                    <th class="column-student-id">Student ID</th>
                                    <th class="column-title">Name </th>
                                    <th class="column-title">Date of Birth | Age </th>
                                    <th class="column-title">Completed Class</th>
                                    <th class="column-title">Available Class</th>
                                    <th class="no-link last no-sort" width="15%"><span class="">Action</span>
                                    </th>
                                       
                    </tr>
                    </thead>

                    <tbody>
                    @if(isset($students))
                        @foreach($students as $student)
                        <tr class="even pointer">
                            <td class=" ">{{ $student->student_id }}</td>

                            <td class=" "><a href="{{ url('admin/students/'.$student->id) }}">{{ $student->firstname.' '. $student->lastname }}</a></td>
                            <td class=" ">{{ date("m/d/Y", strtotime($student->dob)) }} | {{ date_diff(date_create($student->dob), date_create('now'))->y }}</td>
                            <td class=" ">{{ $student->getTotalCompletedClasses() }}  </td>
                            <td class=" ">{{ $student->available_class }}  </td>
                            <td class="">
                                

                                <ul class="nav nav-pills" role="tablist">
                                    <li role="presentation" class="dropdown">
                                      <a id="drop6" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
                                                  Action
                                                  <span class="caret"></span>
                                              </a>
                                      <ul id="menu3" class="dropdown-menu animated fadeInDown" role="menu" aria-labelledby="drop6">
                                        <li role="presentation">
                                            <a href="{{ url('admin/students/'. $student->id . '/book') }}" class=""><i class="fa fa-book"></i> Book by Teacher</a>
                                        </li>
                                        <li role="presentation">
                                            <a href="{{ url('admin/students/'.$student->id.'/select_booking_date') }}" class=""><i class="fa fa-calendar m-right-xs"></i> Book by Date</a>
                                            </li>
                                            
                                        <li role="presentation">
                                            <a href="{{ url('admin/students/'. $student->id . '') }}" class=""><i class="fa fa-eye"></i> View Profile</a>
                                        </li>
                                        <li role="presentation">
                                            <a href="{{ url('admin/students/'. $student->id . '/edit') }}" class=""><i class="fa fa-edit"></i> Edit</a>
                                        </li>
                                      </ul>
                                    </li>
                                  </ul>



                                <!-- <a href="{{ url('admin/students/'. $student->id . '/book') }}" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Book a Class</a>
                                <a href="{{ url('admin/students/'. $student->id . '') }}" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> View Profile</a> -->
                            <!-- <a href="{{ url('admin/students/'. $student->id . '/edit') }}" class="btn btn-default btn-xs"><i class="fa fa-edit"></i> Edit</a> -->
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
