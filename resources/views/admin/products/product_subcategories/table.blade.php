<div class="table-responsive">
<table class="table table-vcenter table-condensed table-bordered table-hover" id="productSubcategories-table">
    <thead class="widget-extra themed-background-dark">
        <tr class="widget-content-light">
            <th>Product Category</th>
            <th>Product Sub-Category</th>
            <th>Status Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody class="widget-extra">
    @foreach($productSubcategories as $productSubcategory)
        <tr>
            <td>{!! $productSubcategory->productCategory->productCategoryTranslations[0]->name !!}</td>
            <td>{!! $productSubcategory->productSubcategoryTranslations[0]->name !!}</td>
            <td>{!! $productSubcategory->status->code !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.productSubcategories.destroy', $productSubcategory->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.productSubcategories.show', [$productSubcategory->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('admin.productSubcategories.edit', [$productSubcategory->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>