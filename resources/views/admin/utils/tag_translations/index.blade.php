@extends('layouts.admin.app')

@section('content')
@include('layouts.admin.partials.dashboard-header-top', [
    'title'         => tags()['back_module_users_user_addresses_title'],
    'subtitle'      => tags()['general_index'],
    'button'        => tags()['general_addnew'],
    'route'         => 'admin.tagTranslations.create',
    'breadcrumb'    => array (
        array (
            'title' => tags()['general_home'],
            'route' => 'home'
        ),
        array (
            'title' => tags()['back_module_users_user_addresses_title'],
        ),
    ),
])

<div class="row">
    <div class="widget">
        @include('admin.utils.tag_translations.table')
    </div>
</div>
@endsection

