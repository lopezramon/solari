<div class="table-responsive">
<table class="table table-vcenter table-condensed table-bordered table-hover" id="clientRequests-table">
    <thead class="widget-extra themed-background-dark">
        <tr class="widget-content-light">
            <th>Checkin Date</th>
            <th>Checkout Date</th>
            <th>Persons Amount</th>
            <th>User Id</th>
            <th>No Register User Name</th>
            <th>No Register User Email</th>
            <th>No Register User Phone</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody class="widget-extra">
    @foreach($clientRequests as $clientRequest)
        <tr>
            <td>{!! $clientRequest->checkin_date !!}</td>
            <td>{!! $clientRequest->checkout_date !!}</td>
            <td>{!! $clientRequest->persons_amount !!}</td>
            <td>{!! $clientRequest->user_id !!}</td>
            <td>{!! $clientRequest->no_register_user_name !!}</td>
            <td>{!! $clientRequest->no_register_user_email !!}</td>
            <td>{!! $clientRequest->no_register_user_phone !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.clientRequests.destroy', $clientRequest->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.clientRequests.show', [$clientRequest->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('admin.clientRequests.edit', [$clientRequest->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>