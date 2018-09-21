<div class="table-responsive">
<table class="table table-vcenter table-condensed table-bordered table-hover" id="table-2">
    <thead class="widget-extra themed-background-dark">
        <tr class="widget-content-light">
            <th>Role</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody class="widget-extra">
    @foreach($role as $rol)
        <tr>
            <td>{!! $rol->name !!}</td>
            <td class="text-center">
                {{-- {!! Form::open(['route' => ['admin.users.destroy', $rol->id], 'method' => 'delete']) !!} --}}
                <div class='btn-group'>
                    <a href="{!! route('admin.users.role.show', [$rol->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('admin.users.role.edit', [$rol->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {{-- {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!} --}}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>