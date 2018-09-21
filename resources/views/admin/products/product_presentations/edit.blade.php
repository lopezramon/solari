@extends('layouts.admin.app')

@section('content')
   @include('layouts.admin.partials.dashboard-header-top', [
       'title'         =>   tags()['back_module_products_product_presentation_title'],
       'subtitle'      =>   tags()['general_edit'],
       'icon'          =>   'fa fa-cogs',
       'breadcrumb'    =>   array (
                               array (
                                   'title' => tags()['general_home'],
                                   'route' => 'home'
                               ),
                               array (
                                   'title' => tags()['back_module_products_product_presentation_title'],
                                   'route' => 'admin.productPresentations.index'
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
                   {!! Form::model($productPresentation, ['route' => ['admin.productPresentations.update', $productPresentation->id], 'method' => 'patch']) !!}

                        @include('admin.products.product_presentations.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection