@extends('layouts.admin.app')

@section('content')
@include('layouts.admin.partials.dashboard-header-top', [
    'title'         => tags()['back_module_products_product_subcategory_title'],
    'subtitle'      => tags()['general_index'],
    'button'        => tags()['general_addnew'],
    'route'         => 'admin.productSubcategories.create',
    'breadcrumb'    => array (
        array (
            'title' => tags()['general_home'],
            'route' => 'home'
        ),
        array (
            'title' => tags()['back_module_products_product_subcategory_title'],
        ),
    ),
    ])
                    
<div class="row">
    <div class="widget">
        @include('admin.products.product_subcategories.table')
    </div>
</div>
@endsection

