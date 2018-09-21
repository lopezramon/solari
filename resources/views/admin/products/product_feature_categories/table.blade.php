<table class="table table-responsive" id="table-5">
    <thead class="widget-extra themed-background-dark">
        <tr class="widget-content-light">
            <th class="text-center">#</th>
            <th>Name</th>
            <th>Description</th>
            <th>Status</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody class="widget-extra">
    @foreach($productFeatureCategories as $productFeatureCategory)
        <tr>
            <td class="text-center">{!! $productFeatureCategory->id !!}</td>
            <td>{!! $productFeatureCategory->name !!}</td>
            <td>{!! $productFeatureCategory->description !!}</td>
            <td>{!! $productFeatureCategory->status->code !!}</td>
            <td class="text-center">
                {!! Form::open(['route' => ['admin.productFeatureCategories.destroy', $productFeatureCategory->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.productFeatureCategories.show', [$productFeatureCategory->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('admin.productFeatureCategories.edit', [$productFeatureCategory->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>