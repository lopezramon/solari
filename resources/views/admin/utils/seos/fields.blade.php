<!-- Row Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('row_id', 'Row Id:') !!}
    {!! Form::number('row_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.seos.index') !!}" class="btn btn-default">Cancel</a>
</div>
