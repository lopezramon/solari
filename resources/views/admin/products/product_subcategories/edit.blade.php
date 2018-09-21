@extends('layouts.admin.app')

@section('content')
   @include('layouts.admin.partials.dashboard-header-top', [
       'title'         =>   tags()['back_module_products_product_subcategory_title'],
       'subtitle'      =>   tags()['general_edit'],
       'icon'          =>   'fa fa-cogs',
       'breadcrumb'    =>   array (
                               array (
                                   'title' => tags()['general_home'],
                                   'route' => 'home'
                               ),
                               array (
                                   'title' => tags()['back_module_products_product_subcategory_title'],
                                   'route' => 'admin.productSubcategories.index'
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
                   {!! Form::model($productSubcategory, ['route' => ['admin.productSubcategories.update', $productSubcategory->id], 'method' => 'patch']) !!}

                        @include('admin.products.product_subcategories.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection