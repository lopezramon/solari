@extends('layouts.admin.app')

@section('content')
@include('layouts.admin.partials.dashboard-header-top', [
    'title'         => tags()['back_module_events_event_title'],
    'subtitle'      => tags()['general_index'],
    'button'        => tags()['general_addnew'],
    'route'         => 'admin.events.create',
    'breadcrumb'    => array (
        array (
            'title' => tags()['general_home'],
            'route' => 'home'
        ),
        array (
            'title' => tags()['back_module_events_event_title'],
        ),
    ),
    ])
                    @include('admin.events.events.table')
@endsection

