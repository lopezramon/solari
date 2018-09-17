newsletterUsers@extends('layouts.admin.app')

@section('content')
   @include('layouts.admin.partials.dashboard-header-top', [
       'title'         =>   tags()['back_module_utils_newsletter_title'],
       'subtitle'      =>   tags()['general_edit'],
       'icon'          =>   'fa fa-cogs',
       'breadcrumb'    =>   array (
                               array (
                                   'title' => tags()['general_home'],
                                   'route' => 'home'
                               ),
                               array (
                                   'title' => tags()['back_module_utils_newsletter_title'],
                                   'route' => 'admin.newsletterUsers.index'
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
                   {!! Form::model($newsletterUser, ['route' => ['admin.newsletterUsers.update', $newsletterUser->id], 'method' => 'patch']) !!}

                        @include('admin.newsletter_users.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection