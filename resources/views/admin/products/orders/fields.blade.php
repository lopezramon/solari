<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', 'Code:') !!}
    {!! Form::text('code', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- User Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_name', 'User Name:') !!}
    {!! Form::text('user_name', null, ['class' => 'form-control']) !!}
</div>

<!-- User Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_email', 'User Email:') !!}
    {!! Form::text('user_email', null, ['class' => 'form-control']) !!}
</div>

<!-- User Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_phone', 'User Phone:') !!}
    {!! Form::text('user_phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Fiscal Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fiscal_code', 'Fiscal Code:') !!}
    {!! Form::text('fiscal_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Delivery Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('delivery_date', 'Delivery Date:') !!}
    {!! Form::date('delivery_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Store Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('store_date', 'Store Date:') !!}
    {!! Form::date('store_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Shipping Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('shipping_date', 'Shipping Date:') !!}
    {!! Form::date('shipping_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Shipping Address Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('shipping_address', 'Shipping Address:') !!}
    {!! Form::textarea('shipping_address', null, ['class' => 'form-control']) !!}
</div>

<!-- Shipping State Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('shipping_state', 'Shipping State:') !!}
    {!! Form::textarea('shipping_state', null, ['class' => 'form-control']) !!}
</div>

<!-- Shipping City Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('shipping_city', 'Shipping City:') !!}
    {!! Form::textarea('shipping_city', null, ['class' => 'form-control']) !!}
</div>

<!-- Shipping Zip Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('shipping_zip', 'Shipping Zip:') !!}
    {!! Form::textarea('shipping_zip', null, ['class' => 'form-control']) !!}
</div>

<!-- Shipping Lat Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('shipping_lat', 'Shipping Lat:') !!}
    {!! Form::textarea('shipping_lat', null, ['class' => 'form-control']) !!}
</div>

<!-- Shipping Lng Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('shipping_lng', 'Shipping Lng:') !!}
    {!! Form::textarea('shipping_lng', null, ['class' => 'form-control']) !!}
</div>

<!-- Invoice Name Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('invoice_name', 'Invoice Name:') !!}
    {!! Form::textarea('invoice_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Invoice Fiscal Code Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('invoice_fiscal_code', 'Invoice Fiscal Code:') !!}
    {!! Form::textarea('invoice_fiscal_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Invoice Sede Fiscal Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('invoice_sede_fiscal', 'Invoice Sede Fiscal:') !!}
    {!! Form::textarea('invoice_sede_fiscal', null, ['class' => 'form-control']) !!}
</div>

<!-- Invoice Address Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('invoice_address', 'Invoice Address:') !!}
    {!! Form::textarea('invoice_address', null, ['class' => 'form-control']) !!}
</div>

<!-- Invoice City Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('invoice_city', 'Invoice City:') !!}
    {!! Form::textarea('invoice_city', null, ['class' => 'form-control']) !!}
</div>

<!-- Invoice State Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('invoice_state', 'Invoice State:') !!}
    {!! Form::textarea('invoice_state', null, ['class' => 'form-control']) !!}
</div>

<!-- Invoice Zip Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('invoice_zip', 'Invoice Zip:') !!}
    {!! Form::textarea('invoice_zip', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total', 'Total:') !!}
    {!! Form::number('total', null, ['class' => 'form-control']) !!}
</div>

<!-- Subtotal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subtotal', 'Subtotal:') !!}
    {!! Form::number('subtotal', null, ['class' => 'form-control']) !!}
</div>

<!-- Iva Field -->
<div class="form-group col-sm-6">
    {!! Form::label('iva', 'Iva:') !!}
    {!! Form::number('iva', null, ['class' => 'form-control']) !!}
</div>

<!-- Show To User Field -->
<div class="form-group col-sm-6">
    {!! Form::label('show_to_user', 'Show To User:') !!}
    {!! Form::number('show_to_user', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_id', 'Status Id:') !!}
    {!! Form::number('status_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.orders.index') !!}" class="btn btn-default">Cancel</a>
</div>
