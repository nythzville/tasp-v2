@extends('layouts.teacher.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        @if(isset($page) && ($page == "CLASSES_TODAY" ))
                        <h2>My Classes Today<small> {{ date("F j, Y", strtotime($current_time)) }}</small></h2>
                        @else
                        <h2>My Classes <small></small></h2>

                        @endif
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        <table class="table list-table table-striped responsive-utilities jambo_table bulk_action">
                            <thead>
                                <tr class="headings">
                                   
                                    <th class="column-title">Time </th>
                                    <th class="column-title">Student </th>
                                    <th class="column-title">Skype ID</th>
                                    <th class="column-title">QQ ID</th>
                                    <th class="column-title">Age </th>
                                    <th class="column-title">Status </th>
                                    <th class="column-title">Action </th>
                                    
                                </tr>
                            </thead>

                            <tbody>
                            @if(isset($classes))

                                @foreach($classes as $class)
                                <tr class="even pointer">
                                    
                                    <td class="date-cell" date-value="{{ date("m/d/Y",strtotime($class->start)) }}"> {{ date("m/d/Y H:i a",strtotime($class->start)) }}</td>
                                    <td class=" "><a href="{{ url('teacher/student/'.$class->student) }}">{{ $class->getStudent->lastname }} {{ $class->getStudent->firstname }}</a></td>
                                    <td class="">{{ $class->getStudent->skype }}</td>
                                    <td class="">{{ $class->getStudent->qq }}</td>

                                    <td class=" ">{{ date_diff(date_create($class->getStudent->dob), date_create('now'))->y }}</td>                                    
                                    
                                    <td class=" ">
                                        @if(( date( $class->end ."+1 day") < date( $current_time ) ) && ($class->status != "COMPLETED"))
                                            {{ "NO EVALUATION" }}
                                        @else    
                                            {{ $class->status }}
                                        @endif
                                    </td>                                    
                                    <!-- <td class=" last"><a href="{{ url('teacher/classes/'.$class->id.'/evaluation' ) }}" class="btn btn-success"><i class="fa fa-eye"></i> View Evaluation</a> -->
                                    <td class="last">
                                        @if(( date( $class->end ."+1 day") > date( $current_time ) ) && ($class->status != "COMPLETED"))
                                            <button class="btn-view-evaluation btn btn-success btn-xs" class-id="{{$class->id}}" date-value="{{ date("m/d/Y",strtotime($class->start)) }}"><i class="fa fa-eye" ></i> {{ ($class->status == 'COMPLETED')? ' View Evaluation' : ' Evaluate' }}</button>
                                        @endif
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
    </div>
    
    
    
@endsection
