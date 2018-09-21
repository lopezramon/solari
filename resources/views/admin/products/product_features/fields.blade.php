<!-- Language Id Field -->
<div class="form-group {{$errors->has('language_id') ? 'has-error' : ''}} col-sm-6 col-sm-offset-3">
    {!! Form::label('language_id', tags()['general_language']) !!}
    {!! Form::select('language_id', $languages, @$productFeature->productFeatureTranslations[0]->language_id, ['class' => 'form-control', 'placeholder' => tags()['general_select']]) !!}
    @if ($errors->has('language_id'))
        <span class="help-block">{{ $errors->first('language_id') }}</span>
    @endif
</div>

<!-- Product Feature Category Id Field -->
<div class="form-group col-sm-6 col-sm-offset-3">
    {!! Form::label('product_feature_category_id', 'Product Feature Category:') !!}
    {{-- {!! Form::number('product_category_id', null, ['class' => 'form-control']) !!} --}}
    {!! Form::select('product_feature_category_id', @$productFeatureCategory, null, ['class' => 'form-control', 'placeholder' => tags()['general_select']]) !!}
    @if ($errors->has('product_feature_category_id'))
        <span class="help-block">{{ $errors->first('product_feature_category_id') }}</span>
    @endif
</div>

<!-- Name Field -->
<div class="form-group {{$errors->has('name') ? 'has-error' : ''}} col-sm-6 col-sm-offset-3">
    {!! Form::label('name', tags()['general_name']) !!}
    {!! Form::text('name', @$productFeature->productFeatureTranslations[0]->name, ['class' => 'form-control']) !!}
    @if ($errors->has('name'))
        <span class="help-block">{{ $errors->first('name') }}</span>
    @endif
</div>

<!-- Description Field -->
<div class="form-group {{$errors->has('description') ? 'has-error' : ''}} col-sm-6 col-sm-offset-3">
    {!! Form::label('description', tags()['general_description']) !!}
    {!! Form::textarea('description', @$productFeature->productFeatureTranslations[0]->description, ['class' => 'form-control']) !!}
    @if ($errors->has('description'))
        <span class="help-block">{{ $errors->first('description') }}</span>
    @endif
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
    <a href="{!! route('admin.productFeatures.index') !!}" class="btn btn-default">Cancel</a>
</div>
