@extends('layouts.teacher.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Reports {{ isset($from_date)? 'from [ '.date("F j, Y",strtotime($from_date)).' ]' : '' }} {{ isset($to_date)? ' to [ '.date("F j, Y",strtotime($to_date)).' ]': '' }}<small> Classes </small></h2>
                        <div class="filter">
                            <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        <table class="table report-table table-striped responsive-utilities jambo_table bulk_action">
                            <thead>
                                <tr class="headings">
                                    
                                    <th class="column-title">Student </th>
                                    <th class="column-title">Number of Students </th>
                                    <th class="column-title">Total Completed Classes </th>
                                    <th class="column-title">Total Available Classes </th>
                                    </th>
                                   
                        </tr>
                    </thead>

                    @if(isset($agents))
                    <tbody>
                    
                        <?php
                        $totalStudents = 0;
                        $totalCompletedClasses = 0;
                        $totalAvailableClasses = 0;

                        ?>
                        @foreach($agents as $agent)
                        <tr class="even pointer">
                            <td class=" ">{{ $agent->lastname.' '. $agent->firstname }}</td>
                            <td class=" ">{{ $agent->getTotalStudents() }} Students</td>
                            <td class=" ">{{ $agent->getTotalCompletedClasses($from_date, $to_date) }} Classes</td>
                            <td class=" ">{{ $agent->getTotalAvailableClasses() }} Classes</td>
                            <?php
                            $totalStudents += $agent->getTotalStudents();
                            $totalCompletedClasses += $agent->getTotalCompletedClasses($from_date, $to_date);
                            $totalAvailableClasses += $agent->getTotalAvailableClasses();
                            
                            ?>
                        </tr>
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr class="pointer">
                            <td class=" "><strong>Total</strong></td>
                            <td class=" "><strong>{{ $totalStudents }} Students</strong></td>
                            <td class=" "><strong>{{ $totalCompletedClasses }} Classes</strong></td>
                            <td class=" "><strong>{{ $totalAvailableClasses }} Classes</strong></td>

                        </tr>

                        <tr class="pointer">
                            <td class=" "><strong>Dates</strong></td>
                            <td class=" " colspan="3"><strong>{{ isset($from_date)? 'from '.date("F j, Y",strtotime($from_date)).' ' : '' }} {{ isset($to_date)? ' to  '.date("F j, Y",strtotime($to_date)).' ': '' }}</strong></td>

                        </tr>
                    </tfoot>
                    @endif
                </table>


            </div>
        </div>
    </div>
</div>
        
        
@endsection
