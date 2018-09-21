@extends('layouts.admin.app')

@section('content')
   @include('layouts.admin.partials.dashboard-header-top', [
       'title'         =>   tags()['back_module_rooms_room_season_title'],
       'subtitle'      =>   tags()['general_edit'],
       'icon'          =>   'fa fa-cogs',
       'breadcrumb'    =>   array (
                               array (
                                   'title' => tags()['general_home'],
                                   'route' => 'home'
                               ),
                               array (
                                   'title' => tags()['back_module_rooms_room_season_title'],
                                   'route' => 'admin.roomSeasons.index'
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
                   {!! Form::model($roomSeason, ['route' => ['admin.roomSeasons.update', $roomSeason->id], 'method' => 'patch']) !!}

                        @include('admin.rooms.room_seasons.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection