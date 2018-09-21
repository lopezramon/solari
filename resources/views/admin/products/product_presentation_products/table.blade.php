<div class="table-responsive">
<table class="table table-vcenter table-condensed table-bordered table-hover" id="productPresentationProducts-table">
    <thead class="widget-extra themed-background-dark">
        <tr class="widget-content-light">
            <th>Product Presentation Id</th>
            <th>Product Id</th>
            <th>Code</th>
            <th>Slug</th>
            <th>Price</th>
            <th>Tax</th>
            <th>Product Quantity</th>
            <th>For Delivery</th>
            <th>Max Quantity Of Sale</th>
            <th>Min Quantity Of Sale</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody class="widget-extra">
    @foreach($productPresentationProducts as $productPresentationProduct)
        <tr>
            <td>{!! $productPresentationProduct->product_presentation_id !!}</td>
            <td>{!! $productPresentationProduct->product_id !!}</td>
            <td>{!! $productPresentationProduct->code !!}</td>
            <td>{!! $productPresentationProduct->slug !!}</td>
            <td>{!! $productPresentationProduct->price !!}</td>
            <td>{!! $productPresentationProduct->tax !!}</td>
            <td>{!! $productPresentationProduct->product_quantity !!}</td>
            <td>{!! $productPresentationProduct->for_delivery !!}</td>
            <td>{!! $productPresentationProduct->max_quantity_of_sale !!}</td>
            <td>{!! $productPresentationProduct->min_quantity_of_sale !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.productPresentationProducts.destroy', $productPresentationProduct->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.productPresentationProducts.show', [$productPresentationProduct->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('admin.productPresentationProducts.edit', [$productPresentationProduct->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>