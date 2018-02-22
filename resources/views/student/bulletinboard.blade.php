@extends('layouts.student.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>News And Announcements </h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                 
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($news as $s_news)
            @if($news[0]->id == $s_news->id)
                <div class="col-md-12 col-sm-12 col-xs-12">
            @else
                <div class="col-md-6 col-sm-6 col-xs-12">
            @endif
                <div class="x_panel">
                    <div class="x_title">
                        <h2 style="width: 80%; overflow: ellipsis;">{{ $s_news->title }}<small>Posted by Admin</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li style="float: right;"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="bs-example" data-example-id="simple-jumbotron">
                            <div class="jumbotron">
                                <?php echo $s_news->content ?>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
