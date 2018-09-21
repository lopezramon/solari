@extends('layouts.admin.app')

@section('content')
@include('layouts.admin.partials.dashboard-header-top', [
    'title'         => 'Product Feature Category it has no label',
    'subtitle'      => tags()['general_index'],
    'button'        => tags()['general_addnew'],
    'route'         => 'admin.productFeatureCategories.create',
    'breadcrumb'    => array (
        array (
            'title' => tags()['general_home'],
            'route' => 'home'
        ),
        array (
            'title' => 'Product Feature Category it has no label',
        ),
    ),
    ])

<div class="row">
    <div class="widget">
            @include('admin.products.product_feature_categories.table')
    </div>
</div>
@endsection

