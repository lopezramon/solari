<div class="table-responsive">
<table class="table table-vcenter table-condensed table-bordered table-hover" id="table-6">
    <thead class="widget-extra themed-background-dark">
        <tr class="widget-content-light">
            <th class="text-center">#</th>
            <th>Feature Category</th>
            <th>Name</th>
            <th>Description</th>
            <th>Status</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody class="widget-extra">
    @foreach($productFeatures as $productFeature)
        <tr>
            <td class="text-center">{!! $productFeature->id !!}</td>
            <td>{!! $productFeature->productFeatureCategory->productFeatureCategoryTranslations[0]->name !!}</td>
            <td>{!! $productFeature->productFeatureTranslations[0]->name !!}</td>
            <td>{!! $productFeature->productFeatureTranslations[0]->description !!}</td>
            <td>{!! $productFeature->status->code !!}</td>
            <td class="text-center">
                {!! Form::open(['route' => ['admin.productFeatures.destroy', $productFeature->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.productFeatures.show', [$productFeature->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('admin.productFeatures.edit', [$productFeature->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>