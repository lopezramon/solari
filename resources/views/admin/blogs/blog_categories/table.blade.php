<div class="table-responsive">
<table class="table table-vcenter table-condensed table-bordered" id="table-3">
    <thead class="widget-extra themed-background-dark">
        <tr class="widget-content-light">
            <th>Code</th>
            <th>Status Id</th>
            <th colspan="3" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody class="widget-extra">
    @foreach($blogCategories as $blogCategory)
        <tr>
            <td>{!! $blogCategory->code !!}</td>
            <td>{!! $blogCategory->status_id !!}</td>
            <td class="text-center">
                {!! Form::open(['route' => ['admin.blogCategories.destroy', $blogCategory->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                    <a href="{!! route('admin.blogCategories.show', [$blogCategory->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('admin.blogCategories.edit', [$blogCategory->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>