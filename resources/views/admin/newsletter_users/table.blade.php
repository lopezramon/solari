<div class="table-responsive">
<table class="table table-vcenter table-condensed table-bordered table-hover" id="table-3">
    <thead class="widget-extra themed-background-dark">
        <tr class="widget-content-light">
            <th>Email</th>
            <th>Status</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody class="widget-extra">
    @foreach($newsletterUsers as $newsletterUser)
        <tr>
            <td>{!! $newsletterUser->email !!}</td>
            <td>{!! $newsletterUser->status_id !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.newsletterUsers.destroy', $newsletterUser->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('admin.newsletterUsers.show', [$newsletterUser->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                        <a href="{!! route('admin.newsletterUsers.edit', [$newsletterUser->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>