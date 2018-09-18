<div class="table-responsive">
<table class="table table-vcenter table-condensed table-bordered table-hover" id="events-table">
    <thead class="widget-extra themed-background-dark">
        <tr class="widget-content-light">
            <th>Slug</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Event Category Id</th>
            <th>Status Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody class="widget-extra">
    @foreach($events as $event)
        <tr>
            <td>{!! $event->slug !!}</td>
            <td>{!! $event->start_date !!}</td>
            <td>{!! $event->end_date !!}</td>
            <td>{!! $event->event_category_id !!}</td>
            <td>{!! $event->status_id !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.events.destroy', $event->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.events.show', [$event->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('admin.events.edit', [$event->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>