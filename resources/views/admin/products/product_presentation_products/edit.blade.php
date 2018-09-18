@extends('layouts.admin.app')

@section('content')
   @include('layouts.admin.partials.dashboard-header-top', [
       'title'         =>   tags()['back_module_products_product_presentation_product_title'],
       'subtitle'      =>   tags()['general_edit'],
       'icon'          =>   'fa fa-cogs',
       'breadcrumb'    =>   array (
                               array (
                                   'title' => tags()['general_home'],
                                   'route' => 'home'
                               ),
                               array (
                                   'title' => tags()['back_module_products_product_presentation_product_title'],
                                   'route' => 'admin.productPresentationProducts.index'
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
                   {!! Form::model($productPresentationProduct, ['route' => ['admin.productPresentationProducts.update', $productPresentationProduct->id], 'method' => 'patch']) !!}

                        @include('admin.products.product_presentation_products.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection