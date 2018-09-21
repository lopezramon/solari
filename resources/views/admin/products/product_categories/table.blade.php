<div class="table-responsive">
<table class="table table-vcenter table-condensed table-bordered table-hover" id="table-4">
    <thead class="widget-extra themed-background-dark">
        <tr class="widget-content-light">
            <th class="text-center">#</th>
            <th>Name</th>
            <th>Description</th>
            <th>Status</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody class="widget-extra">
    @foreach($productCategories as $productCategory)
        <tr>
            <td class="text-center">{!! $productCategory['id'] !!}</td>
            <td>{!! $productCategory['name'] !!}</td>
            <td>{!! $productCategory['description'] !!}</td>
            <td>{!! $productCategory['status_name'] !!}</td>
            <td class="text-center">
                {!! Form::open(['route' => ['admin.productCategories.destroy', $productCategory['id']], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.productCategories.show', [$productCategory['id']]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('admin.productCategories.edit', [$productCategory['id']]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>