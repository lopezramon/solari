@extends('layouts.admin.app')

@section('content')
   @include('layouts.admin.partials.dashboard-header-top', [
       'title'         =>   tags()['back_module_utils_seo_title'],
       'subtitle'      =>   tags()['general_edit'],
       'icon'          =>   'fa fa-cogs',
       'breadcrumb'    =>   array (
                               array (
                                   'title' => tags()['general_home'],
                                   'route' => 'home'
                               ),
                               array (
                                   'title' => tags()['back_module_utils_seo_title'],
                                   'route' => 'admin.seos.index'
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
                   {!! Form::model($seo, ['route' => ['admin.seos.update', $seo->id], 'method' => 'patch']) !!}

                        @include('admin.utils.seos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection