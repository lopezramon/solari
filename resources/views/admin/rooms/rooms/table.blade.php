<div class="table-responsive">
<table class="table table-vcenter table-condensed table-bordered table-hover" id="rooms-table">
    <thead class="widget-extra themed-background-dark">
        <tr class="widget-content-light">
            <th>Slug</th>
            <th>Room Category Id</th>
            <th>Status Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody class="widget-extra">
    @foreach($rooms as $room)
        <tr>
            <td>{!! $room->slug !!}</td>
            <td>{!! $room->room_category_id !!}</td>
            <td>{!! $room->status_id !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.rooms.destroy', $room->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.rooms.show', [$room->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('admin.rooms.edit', [$room->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>