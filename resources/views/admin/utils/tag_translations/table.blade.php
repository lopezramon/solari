<div class="table-responsive">
<table class="table table-vcenter table-condensed table-bordered table-hover" id="table-3">
    <thead class="widget-extra themed-background-dark">
        <tr class="widget-content-light">
            <th>Name</th>
            <th>Value</th>
            <th class="text-center">{{ tags()['general_action'] }}</th>
        </tr>
    </thead>
    <tbody class="widget-extra">
        @foreach($tagTranslations as $screen)
            <tr>
                <td>{!! $screen->tag !!}</td>
                <td>{!! $screen->value !!}</td>
                {{-- <td>{!! $tagTranslation->front_section_id !!}</td>
                <td>{!! $tagTranslation->language_id !!}</td> --}}
                <td class="text-center">
                    {!! Form::open(['route' => ['admin.tagTranslations.destroy', $screen->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        {{--<a href="{!! route('admin.tagTranslations.show', [$screen->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>--}}
                        {{--<a href="{!! route('admin.tagTranslations.edit', [$screen->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>--}}
                        <a href="{!! route('admin.tagTranslations.beforeEdit', [$screen->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                        {{--{!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}--}}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>