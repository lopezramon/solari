@extends('layouts.admin.app')

@section('content')
@include('layouts.admin.partials.dashboard-header-top', [
    'title'         => tags()['back_module_utils_request_category_title'],
    'subtitle'      => tags()['general_index'],
    'button'        => tags()['general_addnew'],
    'route'         => 'admin.requestCategories.create',
    'breadcrumb'    => array (
        array (
            'title' => tags()['general_home'],
            'route' => 'home'
        ),
        array (
            'title' => tags()['back_module_utils_request_category_title'],
        ),
    ),
    ])

<div class="row">
    <div class="widget">
        @include('admin.requests.request_categories.table')
    </div>
</div>
@endsection


