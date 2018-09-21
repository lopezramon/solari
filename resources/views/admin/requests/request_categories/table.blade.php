<div class="table-responsive">
<table class="table table-vcenter table-condensed table-bordered table-hover" id="table-5">
    <thead class="widget-extra themed-background-dark">
        <tr class="widget-content-light">
            <th>#</th>
            <th>Name</th>
            <th>Description</th>
            <th>Status</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody class="widget-extra">
    @foreach($requestCategories as $requestCategory)
        <tr>
            <td>{!! $requestCategory['id'] !!}</td>
            <td>{!! $requestCategory['name'] !!}</td>
            <td>{!! $requestCategory['description'] !!}</td>
            <td>{!! $requestCategory['status_name'] !!}</td>
            <td class="text-center">
                {!! Form::open(['route' => ['admin.requestCategories.destroy', $requestCategory['id']], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.requestCategories.show', [$requestCategory['id']]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('admin.requestCategories.edit', [$requestCategory['id']]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
