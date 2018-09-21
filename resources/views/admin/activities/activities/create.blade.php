@extends('layouts.admin.app')

@section('content')
   @include('layouts.admin.partials.dashboard-header-top', [
       'title'         =>   tags()['back_module_activities_activity_title'],
       'subtitle'      =>   tags()['general_create'],
       'icon'          =>   'fa fa-cogs',
       'breadcrumb'    =>   array (
                               array (
                                   'title' => tags()['general_home'],
                                   'route' => 'home'
                               ),
                               array (
                                   'title' => tags()['back_module_activities_activity_title'],
                                   'route' => 'admin.activities.index'
                               ),
                               array (
                                   'title' => tags()['general_create'],
                               ),
                            )
   ])

   <div class="block full">
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                    {!! Form::open(['route' => 'admin.activities.store']) !!}

                        @include('admin.activities.activities.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
