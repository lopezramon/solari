@extends('layouts.admin.app')

@section('content')
    @include('layouts.admin.partials.dashboard-header-top', [
        'title'         =>  'Product Feature Category it has no label',
        'subtitle'      =>  tags()['general_edit'],
        'icon'          =>  'fa fa-cogs',
        'breadcrumb'    =>  array (
                                array (
                                    'title' => tags()['general_home'],
                                    'route' => 'home'
                                ),
                                array (
                                    'title' => 'Product Feature Category it has no label',
                                    'route' => 'admin.additionalCategories.index'
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
                    {!! Form::model($productFeatureCategory, ['route' => ['admin.productFeatureCategories.update', $productFeatureCategory->id], 'method' => 'patch']) !!}

                        @include('admin.products.product_feature_categories.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection