<div class="table-responsive">
<table class="table table-vcenter table-condensed table-bordered table-hover" id="orders-table">
    <thead class="widget-extra themed-background-dark">
        <tr class="widget-content-light">
            <th>Code</th>
            <th>User Id</th>
            <th>User Name</th>
            <th>User Email</th>
            <th>User Phone</th>
            <th>Fiscal Code</th>
            <th>Delivery Date</th>
            <th>Store Date</th>
            <th>Shipping Date</th>
            <th>Shipping Address</th>
            <th>Shipping State</th>
            <th>Shipping City</th>
            <th>Shipping Zip</th>
            <th>Shipping Lat</th>
            <th>Shipping Lng</th>
            <th>Invoice Name</th>
            <th>Invoice Fiscal Code</th>
            <th>Invoice Sede Fiscal</th>
            <th>Invoice Address</th>
            <th>Invoice City</th>
            <th>Invoice State</th>
            <th>Invoice Zip</th>
            <th>Total</th>
            <th>Subtotal</th>
            <th>Iva</th>
            <th>Show To User</th>
            <th>Status Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody class="widget-extra">
    @foreach($orders as $order)
        <tr>
            <td>{!! $order->code !!}</td>
            <td>{!! $order->user_id !!}</td>
            <td>{!! $order->user_name !!}</td>
            <td>{!! $order->user_email !!}</td>
            <td>{!! $order->user_phone !!}</td>
            <td>{!! $order->fiscal_code !!}</td>
            <td>{!! $order->delivery_date !!}</td>
            <td>{!! $order->store_date !!}</td>
            <td>{!! $order->shipping_date !!}</td>
            <td>{!! $order->shipping_address !!}</td>
            <td>{!! $order->shipping_state !!}</td>
            <td>{!! $order->shipping_city !!}</td>
            <td>{!! $order->shipping_zip !!}</td>
            <td>{!! $order->shipping_lat !!}</td>
            <td>{!! $order->shipping_lng !!}</td>
            <td>{!! $order->invoice_name !!}</td>
            <td>{!! $order->invoice_fiscal_code !!}</td>
            <td>{!! $order->invoice_sede_fiscal !!}</td>
            <td>{!! $order->invoice_address !!}</td>
            <td>{!! $order->invoice_city !!}</td>
            <td>{!! $order->invoice_state !!}</td>
            <td>{!! $order->invoice_zip !!}</td>
            <td>{!! $order->total !!}</td>
            <td>{!! $order->subtotal !!}</td>
            <td>{!! $order->iva !!}</td>
            <td>{!! $order->show_to_user !!}</td>
            <td>{!! $order->status_id !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.orders.destroy', $order->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.orders.show', [$order->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('admin.orders.edit', [$order->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>