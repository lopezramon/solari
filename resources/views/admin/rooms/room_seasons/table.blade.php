<div class="table-responsive">
<table class="table table-vcenter table-condensed table-bordered table-hover" id="roomSeasons-table">
    <thead class="widget-extra themed-background-dark">
        <tr class="widget-content-light">
            <th>Start Date</th>
            <th>End Date</th>
            <th>Price</th>
            <th>Additional Price</th>
            <th>Pet Price</th>
            <th>Room Id</th>
            <th>Status Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody class="widget-extra">
    @foreach($roomSeasons as $roomSeason)
        <tr>
            <td>{!! $roomSeason->start_date !!}</td>
            <td>{!! $roomSeason->end_date !!}</td>
            <td>{!! $roomSeason->price !!}</td>
            <td>{!! $roomSeason->additional_price !!}</td>
            <td>{!! $roomSeason->pet_price !!}</td>
            <td>{!! $roomSeason->room_id !!}</td>
            <td>{!! $roomSeason->status_id !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.roomSeasons.destroy', $roomSeason->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.roomSeasons.show', [$roomSeason->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('admin.roomSeasons.edit', [$roomSeason->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>