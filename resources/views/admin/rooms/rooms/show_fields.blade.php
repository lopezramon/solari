<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $room->id !!}</p>
</div>

<!-- Slug Field -->
<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    <p>{!! $room->slug !!}</p>
</div>

<!-- Room Category Id Field -->
<div class="form-group">
    {!! Form::label('room_category_id', 'Room Category Id:') !!}
    <p>{!! $room->room_category_id !!}</p>
</div>

<!-- Status Id Field -->
<div class="form-group">
    {!! Form::label('status_id', 'Status Id:') !!}
    <p>{!! $room->status_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $room->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $room->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $room->deleted_at !!}</p>
</div>

