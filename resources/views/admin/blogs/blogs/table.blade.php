<div class="table-responsive">
<table class="table table-vcenter table-condensed table-bordered table-hover" id="blogs-table">
    <thead class="widget-extra themed-background-dark">
        <tr class="widget-content-light">
            <th>Slug</th>
            <th>Blog Category Id</th>
            <th>User Id</th>
            <th>Status Id</th>
            <th>Image</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody class="widget-extra">
    @foreach($blogs as $blog)
        <tr>
            <td>{!! $blog->slug !!}</td>
            <td>{!! $blog->blog_category_id !!}</td>
            <td>{!! $blog->user_id !!}</td>
            <td>{!! $blog->status_id !!}</td>
            <td>{!! $blog->image !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.blogs.destroy', $blog->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.blogs.show', [$blog->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('admin.blogs.edit', [$blog->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>