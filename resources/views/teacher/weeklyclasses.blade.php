@extends('layouts.teacher.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>My Weekly Classes <small></small></h2>
                        
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        
                        <div id='classes-calendar'></div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- End Calender modal -->
@endsection
