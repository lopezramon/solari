<div class="table-responsive">
<table class="table table-vcenter table-condensed table-bordered table-hover" id="activityCategories-table">
    <thead class="widget-extra themed-background-dark">
        <tr class="widget-content-light">
            <th>Code</th>
            <th>Status Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody class="widget-extra">
    @foreach($activityCategories as $activityCategory)
        <tr>
            <td>{!! $activityCategory->code !!}</td>
            <td>{!! $activityCategory->status_id !!}</td>
            <td>
            {!! Form::open(['route' => ['admin.activityCategories.destroy', $activityCategory->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.activityCategories.show', [$activityCategory->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('admin.activityCategories.edit', [$activityCategory->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
            {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>