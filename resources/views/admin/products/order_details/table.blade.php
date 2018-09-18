<div class="table-responsive">
<table class="table table-vcenter table-condensed table-bordered table-hover" id="orderDetails-table">
    <thead class="widget-extra themed-background-dark">
        <tr class="widget-content-light">
            <th>Order Id</th>
            <th>Product Id</th>
            <th>Products Quantity</th>
            <th>Comment</th>
            <th>Belongs To Order Detail Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody class="widget-extra">
    @foreach($orderDetails as $orderDetail)
        <tr>
            <td>{!! $orderDetail->order_id !!}</td>
            <td>{!! $orderDetail->product_id !!}</td>
            <td>{!! $orderDetail->products_quantity !!}</td>
            <td>{!! $orderDetail->comment !!}</td>
            <td>{!! $orderDetail->belongs_to_order_detail_id !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.orderDetails.destroy', $orderDetail->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.orderDetails.show', [$orderDetail->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('admin.orderDetails.edit', [$orderDetail->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>