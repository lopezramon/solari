<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $orderDetail->id !!}</p>
</div>

<!-- Order Id Field -->
<div class="form-group">
    {!! Form::label('order_id', 'Order Id:') !!}
    <p>{!! $orderDetail->order_id !!}</p>
</div>

<!-- Product Id Field -->
<div class="form-group">
    {!! Form::label('product_id', 'Product Id:') !!}
    <p>{!! $orderDetail->product_id !!}</p>
</div>

<!-- Products Quantity Field -->
<div class="form-group">
    {!! Form::label('products_quantity', 'Products Quantity:') !!}
    <p>{!! $orderDetail->products_quantity !!}</p>
</div>

<!-- Comment Field -->
<div class="form-group">
    {!! Form::label('comment', 'Comment:') !!}
    <p>{!! $orderDetail->comment !!}</p>
</div>

<!-- Belongs To Order Detail Id Field -->
<div class="form-group">
    {!! Form::label('belongs_to_order_detail_id', 'Belongs To Order Detail Id:') !!}
    <p>{!! $orderDetail->belongs_to_order_detail_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $orderDetail->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $orderDetail->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $orderDetail->deleted_at !!}</p>
</div>

