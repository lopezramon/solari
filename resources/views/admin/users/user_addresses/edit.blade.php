@extends('layouts.admin.app')

@section('content')
   @include('layouts.admin.partials.dashboard-header-top', [
       'title'         =>   tags()['back_module_users_user_addresses_title'],
       'subtitle'      =>   tags()['general_edit'],
       'icon'          =>   'fa fa-cogs',
       'breadcrumb'    =>   array (
                               array (
                                   'title' => tags()['general_home'],
                                   'route' => 'home'
                               ),
                               array (
                                   'title' => tags()['back_module_users_user_addresses_title'],
                                   'route' => 'admin.userAddresses.index'
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
                   {!! Form::model($userAddress, ['route' => ['admin.userAddresses.update', $userAddress->id], 'method' => 'patch']) !!}

                        @include('admin.users.user_addresses.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection