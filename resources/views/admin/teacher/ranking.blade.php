@extends('layouts.admin.app')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Teachers Ranking<small>Top Teachers</small></h2>
                    
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <p>Drag teachers according to their <code>rankings</code></p>

                @if(session('success'))
                    <div class="alert alert-success">
                    <ul>
                        <li>{{session('success')}}</li>
                    </ul>
                    </div>
                @endif
                <style type="text/css">
                    #ranking li, #teaches-list li{
                        cursor: pointer;
                    }
                </style>
                <div class="col-md-6">
                    <h3>Ranking</h3>
                    <ul id="ranking" class="connectedSortable list-unstyled to_do">
                      @foreach($rankings as $s_rank)
                      <li class="ui-state-default" teacher-id="{{ $s_rank->getTeacher->id }}"><span class="rank-no">#{{ $s_rank->rank }} </span>{{ $s_rank->getTeacher->lastname }} {{ $s_rank->getTeacher->firstname }}</li>
                      @endforeach
                    </ul>
                    {!! Form::open(array('url' => 'admin/teacher/ranking', 'method' => 'POST')) !!}
                        <input type="hidden" name="ranking-order" id="ranking-order">
                        <button type="submit" class="btn btn-primary" id="save-ranking">Save Ranking</button>
                    {!! Form::close() !!}    
                </div>
                
                <div class="col-md-6">
                    <h3>Teachers List</h3>

                    <ul id="teachers-list" class="list-unstyled to_do">
                      @foreach($teachers as $teacher)
                      <li class="ui-state-default" teacher-id="{{ $teacher->id }}">
                        <span class="rank-no"></span>{{ $teacher->lastname }} {{ $teacher->firstname }}</li>
                      @endforeach
                    </ul> 
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $( function() {
    // $( "#ranking" ).sortable();
    // $( "#teachers-list" ).sortable();

    $("#ranking, #teachers-list").sortable({
        connectWith: '.connectedSortable',
        start: function() {
        
        },
        over: function() {
        },
        stop: function() {

            var rank_order = [];
            $('#ranking').find('li').each(function(index, item){
                // console.log(item);
                rank_order.push($(item).attr("teacher-id"));
                $(item).find('span.rank-no').text( "#" + (index + 1) + " ");
            }); 
            // console.log(rank_order);
            $('#ranking-order').val(JSON.stringify(rank_order));
        }   
    }).disableSelection();

  } );
</script>
@endsection
