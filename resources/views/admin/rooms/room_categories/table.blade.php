<div class="table-responsive">
<table class="table table-vcenter table-condensed table-bordered table-hover" id="roomCategories-table">
    <thead class="widget-extra themed-background-dark">
        <tr class="widget-content-light">
            <th>Code</th>
            <th>Status Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody class="widget-extra">
    @foreach($roomCategories as $roomCategory)
        <tr>
            <td>{!! $roomCategory->code !!}</td>
            <td>{!! $roomCategory->status_id !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.roomCategories.destroy', $roomCategory->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.roomCategories.show', [$roomCategory->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('admin.roomCategories.edit', [$roomCategory->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>