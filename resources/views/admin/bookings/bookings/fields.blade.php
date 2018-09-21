<!-- Subtotal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subtotal', 'Subtotal:') !!}
    {!! Form::number('subtotal', null, ['class' => 'form-control']) !!}
</div>

<!-- Tax Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tax', 'Tax:') !!}
    {!! Form::number('tax', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total', 'Total:') !!}
    {!! Form::number('total', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- No Register User Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_register_user_name', 'No Register User Name:') !!}
    {!! Form::text('no_register_user_name', null, ['class' => 'form-control']) !!}
</div>

<!-- No Register User Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_register_user_email', 'No Register User Email:') !!}
    {!! Form::text('no_register_user_email', null, ['class' => 'form-control']) !!}
</div>

<!-- No Register User Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_register_user_phone', 'No Register User Phone:') !!}
    {!! Form::text('no_register_user_phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_id', 'Status Id:') !!}
    {!! Form::number('status_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.bookings.index') !!}" class="btn btn-default">Cancel</a>
</div>
