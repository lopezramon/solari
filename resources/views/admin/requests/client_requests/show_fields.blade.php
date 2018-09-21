<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $clientRequest->id !!}</p>
</div>

<!-- Checkin Date Field -->
<div class="form-group">
    {!! Form::label('checkin_date', 'Checkin Date:') !!}
    <p>{!! $clientRequest->checkin_date !!}</p>
</div>

<!-- Checkout Date Field -->
<div class="form-group">
    {!! Form::label('checkout_date', 'Checkout Date:') !!}
    <p>{!! $clientRequest->checkout_date !!}</p>
</div>

<!-- Persons Amount Field -->
<div class="form-group">
    {!! Form::label('persons_amount', 'Persons Amount:') !!}
    <p>{!! $clientRequest->persons_amount !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{!! $clientRequest->user_id !!}</p>
</div>

<!-- No Register User Name Field -->
<div class="form-group">
    {!! Form::label('no_register_user_name', 'No Register User Name:') !!}
    <p>{!! $clientRequest->no_register_user_name !!}</p>
</div>

<!-- No Register User Email Field -->
<div class="form-group">
    {!! Form::label('no_register_user_email', 'No Register User Email:') !!}
    <p>{!! $clientRequest->no_register_user_email !!}</p>
</div>

<!-- No Register User Phone Field -->
<div class="form-group">
    {!! Form::label('no_register_user_phone', 'No Register User Phone:') !!}
    <p>{!! $clientRequest->no_register_user_phone !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $clientRequest->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $clientRequest->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $clientRequest->deleted_at !!}</p>
</div>

