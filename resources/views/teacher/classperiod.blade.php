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
                        
                        @elseif(isset($page) && ($page == "UPCOMING_CLASSES" ))
                        <h2>Upcoming Classes<small></small></h2>

                        @elseif(isset($page) && ($page == "COMPLETED_CLASSES" ))
                        <h2>Completed Classes<small></small></h2>
                        
                        @elseif(isset($page) && ($page == "BOOKED_CLASSES" ))
                        <h2>Booked Classes<small></small></h2>


                        @else
                        <h2>My Classes <small></small></h2>
                        @endif
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        @if(session('success'))
                                <div class="alert alert-success">
                                <ul>
                                    <li><?php echo  session('success'); ?></li>
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

                        <table class="table list-table table-striped responsive-utilities jambo_table bulk_action">
                            <thead>
                                <tr class="headings">
                                   
                                    <th class="column-title">Time </th>
                                    <th class="column-title">Student </th>
                                    <th class="column-title">Skype ID</th>
                                    <th class="column-title">QQ ID</th>
                                    <th class="column-title">Age </th>
                                    <th class="column-title">Type </th>
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
                                    
                                    <td class="" style="{{ ($class->type == "TRIAL")? 'color:blue;': 'color:#4cae4c;' }}" >
                                        <!-- @if(( date( $class->end ."+1 day") < date( $current_time ) ) && ($class->status != "COMPLETED"))
                                            {{ "NO EVALUATION" }}
                                        @else    
                                            {{ $class->status }}
                                        @endif -->
                                        {{ $class->type }}
                                    </td>                                    
                                    <!-- <td class=" last"><a href="{{ url('teacher/classes/'.$class->id.'/evaluation' ) }}" class="btn btn-success"><i class="fa fa-eye"></i> View Evaluation</a> -->
                                    <td class="last">
                                        @if ( date( strtotime($class->end ."+1 day") ) > date( strtotime($current_time) ) )
                                            @if($class->status != "COMPLETED")
                                                
                                                @if($class->type == 'TRIAL')
                                                    <a href="{{ url('teacher/classes/'.$class->id.'/evaluate_trial') }}" class="btn btn-success btn-xs" class-id="{{$class->id}}" date-value=""><i class="fa fa-eye"></i>Evaluate</button>
                                                @else
                                                <button class="btn-view-evaluation btn btn-success btn-xs" class-id="{{$class->id}}" date-value="{{ date("m/d/Y",strtotime($class->start)) }}"><i class="fa fa-eye" ></i>Evaluate</button>
                                                @endif

                                            @else
                                                @if($class->type == 'TRIAL')
                                                    <a href="{{ url('teacher/classes/'.$class->id.'/evaluate_trial') }}" class="btn btn-success btn-xs" class-id="{{$class->id}}" date-value=""><i class="fa fa-eye"></i> View Evaluation</button>
                                                @else
                                                <button class="btn-view-evaluation btn btn-success btn-xs" class-id="{{$class->id}}" date-value="{{ date("m/d/Y",strtotime($class->start)) }}"><i class="fa fa-eye" ></i> View Evaluation</button>
                                                @endif
                                            @endif

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
