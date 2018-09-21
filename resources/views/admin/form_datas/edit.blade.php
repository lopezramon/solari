@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Form Data
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($formData, ['route' => ['admin.formDatas.update', $formData->id], 'method' => 'patch']) !!}

                        @include('admin.form_datas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection