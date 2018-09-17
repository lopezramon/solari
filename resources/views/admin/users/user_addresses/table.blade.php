<div class="table-responsive">
<table class="table table-vcenter table-condensed table-bordered table-hover" id="userAddresses-table">
    <thead class="widget-extra themed-background-dark">
        <tr class="widget-content-light">
            <th>Alias</th>
            <th>Description</th>
            <th>User Id</th>
            <th>Status Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody class="widget-extra">
    @foreach($userAddresses as $userAddress)
        <tr>
            <td>{!! $userAddress->alias !!}</td>
            <td>{!! $userAddress->description !!}</td>
            <td>{!! $userAddress->user_id !!}</td>
            <td>{!! $userAddress->status_id !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.userAddresses.destroy', $userAddress->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.userAddresses.show', [$userAddress->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('admin.userAddresses.edit', [$userAddress->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>