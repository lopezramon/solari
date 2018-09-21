{{-- @extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Request Category
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($requestCategory, ['route' => ['admin.requestCategories.update', $requestCategory->id], 'method' => 'patch']) !!}


                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection --}}
@extends('layouts.admin.app')

@section('content')
   @include('layouts.admin.partials.dashboard-header-top', [
       'title'         =>   tags()['back_module_utils_request_category_title'],
       'subtitle'      =>   tags()['general_edit'],
       'icon'          =>   'fa fa-cogs',
       'breadcrumb'    =>   array (
                               array (
                                   'title' => tags()['general_home'],
                                   'route' => 'home'
                               ),
                               array (
                                   'title' => tags()['back_module_utils_request_category_title'],
                                   'route' => 'admin.requestCategories.index'
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
                   {!! Form::model($requestCategory, ['route' => ['admin.requestCategories.update', $requestCategory->id], 'method' => 'patch']) !!}

                        @include('admin.requests.request_categories.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection