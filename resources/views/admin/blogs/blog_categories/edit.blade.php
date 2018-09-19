@extends('layouts.admin.app')

@section('content')
   @include('layouts.admin.partials.dashboard-header-top', [
       'title'         =>   tags()['back_module_blogs_blog_category_title'],
       'subtitle'      =>   tags()['general_edit'],
       'icon'          =>   'fa fa-cogs',
       'breadcrumb'    =>   array (
                               array (
                                   'title' => tags()['general_home'],
                                   'route' => 'home'
                               ),
                               array (
                                   'title' => tags()['back_module_blogs_blog_category_title'],
                                   'route' => 'admin.blogCategories.index'
                               ),
                               array (
                                   'title' => tags()['general_edit'],
                               ),
                            )
   ])

   <div class="block full">
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($blogCategory, ['route' => ['admin.blogCategories.update', $blogCategory->id], 'method' => 'patch']) !!}

                        @include('admin.blogs.blog_categories.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection