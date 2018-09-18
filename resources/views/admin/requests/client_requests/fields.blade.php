<!-- Checkin Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('checkin_date', 'Checkin Date:') !!}
    {!! Form::text('checkin_date',null, ['class' => 'form-control', 'id' => 'checkin', 'placeholder' => @$request->checkout_date]) !!}
</div>


<!-- Checkout Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('checkout_date', 'Checkout Date:') !!}
    {!! Form::text('checkout_date', null, ['class' => 'form-control', 'id' => 'checkout', 'placeholder' => @$request->checkout_date]) !!}
</div>

<!-- Persons Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('persons_amount', 'Persons Amount:') !!}
    {!! Form::number('persons_amount', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- No Register User Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_register_user_name', 'Name:') !!}
    {!! Form::text('no_register_user_name', null, ['class' => 'form-control']) !!}
</div>

<!-- No Register User Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_register_user_email', 'Email:') !!}
    {!! Form::text('no_register_user_email', null, ['class' => 'form-control']) !!}
</div>

<!-- No Register User Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_register_user_phone', 'Phone:') !!}
    {!! Form::text('no_register_user_phone', null, ['class' => 'form-control']) !!}
</div>

<!-- RequestCategory Field -->
<div class="form-group {{$errors->has('status_id') ? 'has-error' : ''}} col-sm-6 col-sm-offset-3">
    {!! Form::label('status_id', tags()['back_module_utils_request_category_title'], ['class' => 'control-label']) !!}
    {!! Form::select('status_id', $requestCategory, @$requestCategory->status_id, ['class' => 'select-chosen', 'data-placeholder' => tags()['general_select'], 'placeholder' => tags()['general_select']]) !!}
    @if ($errors->has('status_id'))
        <span class="help-block">{{ $errors->first('status_id') }}</span>
    @endif
</div>

<!-- Description Field -->
<div class="form-group col-sm-6 col-sm-offset-3 {{ $errors->has('description') ? 'has-error' : '' }}">
    {!! Form::label('description', tags()['general_description'], ['class' => 'control-label']) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    @if ($errors->has('description'))
        <span class="help-block">{{ $errors->first('description') }}</span>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(tags()['general_save'], ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.clientRequests.index') !!}" class="btn btn-default">{{ tags()['general_back'] }}</a>
</div>

@push('scripts')
    <script type="text/javascript">
        var checkin_date = "{{@$request->checkin_date}}";
        var checkout_date = "{{@$request->checkout_date}}";

        $(function () {
            $('#checkin').datetimepicker({
                //defaultDate: "11/1/2013"
            });
            $('#checkout').datetimepicker({
                //defaultDate: "{{@$request->checkout_date}}"
            });
        });
    </script>
@endpush