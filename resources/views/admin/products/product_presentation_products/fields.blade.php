<!-- Product Presentation Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_presentation_id', 'Product Presentation Id:') !!}
    {!! Form::number('product_presentation_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Product Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_id', 'Product Id:') !!}
    {!! Form::number('product_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', 'Code:') !!}
    {!! Form::text('code', null, ['class' => 'form-control']) !!}
</div>

<!-- Slug Field -->
<div class="form-group col-sm-6">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
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

<!-- Product Quantity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_quantity', 'Product Quantity:') !!}
    {!! Form::number('product_quantity', null, ['class' => 'form-control']) !!}
</div>

<!-- For Delivery Field -->
<div class="form-group col-sm-6">
    {!! Form::label('for_delivery', 'For Delivery:') !!}
    {!! Form::number('for_delivery', null, ['class' => 'form-control']) !!}
</div>

<!-- Max Quantity Of Sale Field -->
<div class="form-group col-sm-6">
    {!! Form::label('max_quantity_of_sale', 'Max Quantity Of Sale:') !!}
    {!! Form::number('max_quantity_of_sale', null, ['class' => 'form-control']) !!}
</div>

<!-- Min Quantity Of Sale Field -->
<div class="form-group col-sm-6">
    {!! Form::label('min_quantity_of_sale', 'Min Quantity Of Sale:') !!}
    {!! Form::number('min_quantity_of_sale', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.productPresentationProducts.index') !!}" class="btn btn-default">Cancel</a>
</div>
