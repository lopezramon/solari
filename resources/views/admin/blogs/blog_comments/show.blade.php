@extends('layouts.admin.app')

@section('content')
   @include('layouts.admin.partials.dashboard-header-top', [
       'title'         =>   tags()['back_module_blogs_blog_comment_title'],
       'subtitle'      =>   tags()['general_show'],
       'icon'          =>   'fa fa-cogs',
       'breadcrumb'    =>   array (
                               array (
                                   'title' => tags()['general_home'],
                                   'route' => 'home'
                               ),
                               array (
                                   'title' => tags()['back_module_blogs_blog_comment_title'],
                                   'route' => 'admin.blogComments.index'
                               ),
                               array (
                                   'title' => tags()['general_show'],
                               ),
                            )
   ])

   <div class="block full">
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                    @include('admin.blogs.blog_comments.show_fields')
                    <a href="{!! route('admin.blogComments.index') !!}" class="btn btn-default">{{ tags()['general_back'] }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
