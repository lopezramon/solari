<div class="table-responsive">
<table class="table table-vcenter table-condensed table-bordered table-hover" id="activities-table">
    <thead class="widget-extra themed-background-dark">
        <tr class="widget-content-light">
            <th>Slug</th>
            <th>Price</th>
            <th>Activity Category Id</th>
            <th>Status Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody class="widget-extra">
    @foreach($activities as $activity)
        <tr>
            <td>{!! $activity->slug !!}</td>
            <td>{!! $activity->price !!}</td>
            <td>{!! $activity->activity_category_id !!}</td>
            <td>{!! $activity->status_id !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.activities.destroy', $activity->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.activities.show', [$activity->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('admin.activities.edit', [$activity->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>