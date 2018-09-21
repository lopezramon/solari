<table class="table table-responsive" id="formDatas-table">
    <thead>
        <tr>
            <th>Email</th>
        <th>Name</th>
        <th>Lastname</th>
        <th>Phone</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($formDatas as $formData)
        <tr>
            <td>{!! $formData->email !!}</td>
            <td>{!! $formData->name !!}</td>
            <td>{!! $formData->lastname !!}</td>
            <td>{!! $formData->phone !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.formDatas.destroy', $formData->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.formDatas.show', [$formData->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.formDatas.edit', [$formData->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>