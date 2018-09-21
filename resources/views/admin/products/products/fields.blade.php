<!-- Language Id Field -->
<div class="form-group {{$errors->has('language_id') ? 'has-error' : ''}} col-sm-6 col-sm-offset-3">
    {!! Form::label('language_id', tags()['general_language']) !!}
    {!! Form::select('language_id', $languages, @$product->productTranslations[0]->language_id, ['class' => 'form-control', 'placeholder' => tags()['general_select']]) !!}
    @if ($errors->has('language_id'))
        <span class="help-block">{{ $errors->first('language_id') }}</span>
    @endif
</div>

<!-- Product Subcategory Field -->
<div class="form-group {{$errors->has('subcategory_id') ? 'has-error' : ''}} col-sm-6 col-sm-offset-3">
    {!! Form::label('subcategory_id', 'Subcategory Id: -> Sin Etiqueta') !!}
    {!! Form::select('subcategory_id', $productSubcategories, null, ['class' => 'form-control', 'placeholder' => tags()['general_select']]) !!}
    @if ($errors->has('subcategory_id'))
        <span class="help-block">{{ $errors->first('subcategory_id') }}</span>
    @endif
</div>

<!-- Additional Category Field -->
<div class="form-group {{$errors->has('additional_category_id') ? 'has-error' : ''}} col-sm-6 col-sm-offset-3">
    {!! Form::label('additional_category_id', 'Additional Category Id: -> Sin Etiqueta') !!}
    {!! Form::select('additional_category_id', $additionalCategories, null, ['class' => 'form-control', 'placeholder' => tags()['general_select']]) !!}
    @if ($errors->has('additional_category_id'))
        <span class="help-block">{{ $errors->first('additional_category_id') }}</span>
    @endif
</div>

<!-- Product Feature Category Field -->
<div class="form-group {{$errors->has('product_feature_id') ? 'has-error' : ''}} col-sm-6 col-sm-offset-3">
    {!! Form::label('product_feature_id', 'Product Feature Id: -> Sin Etiqueta') !!}
    {!! Form::select('product_feature_id', $productFeatureCategories, null, ['class' => 'form-control', 'placeholder' => tags()['general_select']]) !!}
    @if ($errors->has('product_feature_id'))
        <span class="help-block">{{ $errors->first('product_feature_id') }}</span>
    @endif
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::number('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Tax Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tax', 'Tax:') !!}
    {!! Form::number('tax', null, ['class' => 'form-control']) !!}
</div>

<!-- For Delivery Field -->
<div class="form-group col-sm-6">
    {!! Form::label('for_delivery', 'For Delivery:') !!}
    {!! Form::number('for_delivery', null, ['class' => 'form-control']) !!}
</div>

<!-- Max Additionals Field -->
<div class="form-group col-sm-6">
    {!! Form::label('max_additionals', 'Max Additionals:') !!}
    {!! Form::number('max_additionals', null, ['class' => 'form-control']) !!}
</div>

<!-- Brand Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('brand_id', 'Brand Id:') !!}
    {!! Form::number('brand_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group {{$errors->has('status_id') ? 'has-error' : ''}} col-sm-6 col-sm-offset-3">
    {!! Form::label('status_id', tags()['general_status']) !!}
    {!! Form::select('status_id', $statuses, null, ['class' => 'form-control', 'placeholder' => tags()['general_select']]) !!}
    @if ($errors->has('status_id'))
        <span class="help-block">{{ $errors->first('status_id') }}</span>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group col-sm-6 col-sm-offset-3">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.products.index') !!}" class="btn btn-default">Cancel</a>
</div>
