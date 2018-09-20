@extends('layouts.admin.app')

@section('content')
@include('layouts.admin.partials.dashboard-header-top', [
    'title'         => tags()['back_module_products_product_presentation_title'],
    'subtitle'      => tags()['general_index'],
    'button'        => tags()['general_addnew'],
    'route'         => 'admin.productPresentations.create',
    'breadcrumb'    => array (
        array (
            'title' => tags()['general_home'],
            'route' => 'home'
        ),
        array (
            'title' => tags()['back_module_products_product_presentation_title'],
        ),
    ),
    ])
                    
<div class="row">
    <div class="widget">
        @include('admin.products.product_presentations.table')
    </div>
</div>
@endsection

