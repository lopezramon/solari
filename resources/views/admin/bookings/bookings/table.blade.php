<div class="table-responsive">
<table class="table table-vcenter table-condensed table-bordered table-hover" id="bookings-table">
    <thead class="widget-extra themed-background-dark">
        <tr class="widget-content-light">
            <th>Subtotal</th>
            <th>Tax</th>
            <th>Total</th>
            <th>User Id</th>
            <th>No Register User Name</th>
            <th>No Register User Email</th>
            <th>No Register User Phone</th>
            <th>Status Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody class="widget-extra">
    @foreach($bookings as $booking)
        <tr>
            <td>{!! $booking->subtotal !!}</td>
            <td>{!! $booking->tax !!}</td>
            <td>{!! $booking->total !!}</td>
            <td>{!! $booking->user_id !!}</td>
            <td>{!! $booking->no_register_user_name !!}</td>
            <td>{!! $booking->no_register_user_email !!}</td>
            <td>{!! $booking->no_register_user_phone !!}</td>
            <td>{!! $booking->status_id !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.bookings.destroy', $booking->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.bookings.show', [$booking->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('admin.bookings.edit', [$booking->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>