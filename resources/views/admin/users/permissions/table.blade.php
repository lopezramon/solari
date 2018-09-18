<div class="table-responsive">
<table class="table table-vcenter table-condensed table-bordered table-hover" id="permissions-table">
    <thead class="widget-extra themed-background-dark">
        <tr class="widget-content-light">
            <th>Name</th>
            <th>Slug</th>
            <th>Description</th>
            <th>Module Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody class="widget-extra">
    @foreach($permissions as $permission)
        <tr>
            <td>{!! $permission->name !!}</td>
            <td>{!! $permission->slug !!}</td>
            <td>{!! $permission->description !!}</td>
            <td>{!! $permission->module_id !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.permissions.destroy', $permission->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.permissions.show', [$permission->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('admin.permissions.edit', [$permission->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>