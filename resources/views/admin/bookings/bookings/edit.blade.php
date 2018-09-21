@extends('layouts.admin.app')

@section('content')
   @include('layouts.admin.partials.dashboard-header-top', [
       'title'         =>   tags()['back_module_bookings_boking_title'],
       'subtitle'      =>   tags()['general_edit'],
       'icon'          =>   'fa fa-cogs',
       'breadcrumb'    =>   array (
                               array (
                                   'title' => tags()['general_home'],
                                   'route' => 'home'
                               ),
                               array (
                                   'title' => tags()['back_module_bookings_boking_title'],
                                   'route' => 'admin.bookings.index'
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
                   {!! Form::model($booking, ['route' => ['admin.bookings.update', $booking->id], 'method' => 'patch']) !!}

                        @include('admin.bookings.bookings.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection