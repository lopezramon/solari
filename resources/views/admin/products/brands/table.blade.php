<div class="table-responsive">
<table class="table table-vcenter table-condensed table-bordered table-hover" id="brands-table">
    <thead class="widget-extra themed-background-dark">
        <tr class="widget-content-light">
            <th>Slug</th>
            <th>Code</th>
            <th>Status Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody class="widget-extra">
    @foreach($brands as $brand)
        <tr>
            <td>{!! $brand->slug !!}</td>
            <td>{!! $brand->code !!}</td>
            <td>{!! $brand->status_id !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.brands.destroy', $brand->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.brands.show', [$brand->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('admin.brands.edit', [$brand->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>