<!-- Order Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('order_id', 'Order Id:') !!}
    {!! Form::number('order_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Product Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_id', 'Product Id:') !!}
    {!! Form::number('product_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Products Quantity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('products_quantity', 'Products Quantity:') !!}
    {!! Form::number('products_quantity', null, ['class' => 'form-control']) !!}
</div>

<!-- Comment Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('comment', 'Comment:') !!}
    {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}
</div>

<!-- Belongs To Order Detail Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('belongs_to_order_detail_id', 'Belongs To Order Detail Id:') !!}
    {!! Form::number('belongs_to_order_detail_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.orderDetails.index') !!}" class="btn btn-default">Cancel</a>
</div>
