<div class="table-responsive">
<table class="table table-vcenter table-condensed table-bordered table-hover" id="table-8">
    <thead class="widget-extra themed-background-dark">
        <tr class="widget-content-light">
            <th>#</th>
            <th>Image</th>
            <th>Brand</th>
            <th>Subcategory</th>
            <th>Additional</th>
            <th>Feature</th>
            <th>Status</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody class="widget-extra">
    @foreach($products as $product)
        <tr>
            <td>{!! $product->id !!}</td>
            <td><img src="{{ ($product->image) }}" alt="images" class="animation-pulseSlow"></td>
            <td>{!! $product->brand->brandTranslations[0]->name !!}</td>
            <td>{!! $product->productSubcategory->productSubcategoryTranslations[0]->name !!}</td>
            <td>{!! @$product->additionalCategory->additionalCategoryTranslations[0]->name !!}</td>
            <td>{!! @$product->productFeatureCategory->productFeatureCategoryTranslations[0]->name !!}</td>
            <td>{!! $product->status->code !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.products.destroy', $product->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.products.show', [$product->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('admin.products.edit', [$product->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>