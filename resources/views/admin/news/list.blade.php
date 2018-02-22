@extends('layouts.admin.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>News List <small>All News</small></h2>
                        
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
                                    <th class="column-title">Title </th>
                                    <th class="column-title">Author </th>
                                    <th class="column-title">Status </th>
                                    <th class="column-title no-link last"><span class="nobr">Action</span>
                                    </th>
                                    <th class="bulk-actions" colspan="7">
                                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                </th>
                    </tr>
                    </thead>

                    <tbody>
                    @if(isset($news_list))

                        @foreach($news_list as $news)
                        <tr class="even pointer">
                            <td class="a-center "><input type="checkbox" class="flat" name="table_records" ></td>
                            <td class=" ">{{ $news->title }}</td>
                            <td class=" ">{{ $news->author }} </td>
                            <td class=" ">{{ $news->status }} </td>

                            <td class=" last"><a class="btn btn-xs btn-success"><i class="fa fa-eye" data-toggle="modal" data-target="#NewsModal"></i> View</a>
                            <a href="{{ url('admin/news/'. $news->id . '/edit') }}" class="btn btn-xs btn-default"><i class="fa fa-edit"></i> Edit</a>
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
<!-- Start View News modal -->
<div id="NewsModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">News</h4>
            </div>
            <div class="modal-body">
                <div id="testmodal" style="padding: 5px 20px;">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2 style="width: 80%; overflow: ellipsis;">The Title<small>Posted by Admin</small></h2>
                            
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <div class="bs-example" data-example-id="simple-jumbotron">
                                <div class="jumbotron">
                                    The content
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>        
        
@endsection
