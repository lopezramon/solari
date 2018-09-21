@extends('layouts.admin.app')

@section('content')
@include('layouts.admin.partials.dashboard-header-top', [
    'title'         => tags()['back_module_utils_newsletter_title'],
    'subtitle'      => tags()['general_index'],
    'button'        => tags()['general_addnew'],
    'route'         => 'admin.newsletterUsers.create',
    'breadcrumb'    => array (
        array (
            'title' => tags()['general_home'],
            'route' => 'home'
        ),
        array (
            'title' => tags()['back_module_utils_newsletter_title'],
        ),
    ),
    ])
    
<div class="row">
    <div class="widget">
        @include('admin.newsletter_users.table')
    </div>
</div>
@endsection

