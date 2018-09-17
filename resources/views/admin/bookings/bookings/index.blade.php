@extends('layouts.admin.app')

@section('content')
@include('layouts.admin.partials.dashboard-header-top', [
    'title'         => tags()['back_module_bookings_boking_title'],
    'subtitle'      => tags()['general_index'],
    'button'        => tags()['general_addnew'],
    'route'         => 'admin.bookings.create',
    'breadcrumb'    => array (
        array (
            'title' => tags()['general_home'],
            'route' => 'home'
        ),
        array (
            'title' => tags()['back_module_bookings_boking_title'],
        ),
    ),
    ])
                    @include('admin.bookings.bookings.table')
@endsection

