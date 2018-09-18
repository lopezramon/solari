@extends('layouts.admin.app')
@section('content')
    @include('layouts.admin.partials.dashboard-header-top', [
        'title'         =>  'Product Feature it has no label',
        'subtitle'      =>  tags()['general_create'],
        'icon'          =>  'fa fa-cogs',
        'breadcrumb'    =>  array (
                                array (
                                    'title' => tags()['general_home'],
                                    'route' => 'home'
                                ),
                                array (
                                    'title' => 'Product Feature it has no label',
                                    'route' => 'admin.productFeatures.index'
                                ),
                                array (
                                    'title' => tags()['general_create'],
                                ),
                            )
    ])

    <div class="block full">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'admin.productFeatures.store']) !!}

                        @include('admin.products.product_features.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
