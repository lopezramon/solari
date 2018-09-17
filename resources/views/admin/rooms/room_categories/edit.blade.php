@extends('layouts.admin.app')

@section('content')
   @include('layouts.admin.partials.dashboard-header-top', [
       'title'         =>   tags()['back_module_rooms_room_category_title'],
       'subtitle'      =>   tags()['general_edit'],
       'icon'          =>   'fa fa-cogs',
       'breadcrumb'    =>   array (
                               array (
                                   'title' => tags()['general_home'],
                                   'route' => 'home'
                               ),
                               array (
                                   'title' => tags()['back_module_rooms_room_category_title'],
                                   'route' => 'admin.roomCategories.index'
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
                   {!! Form::model($roomCategory, ['route' => ['admin.roomCategories.update', $roomCategory->id], 'method' => 'patch']) !!}

                        @include('admin.rooms.room_categories.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection