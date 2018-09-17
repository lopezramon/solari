<div class="table-responsive">
<table class="table table-vcenter table-condensed table-bordered table-hover" id="seos-table">
    <thead class="widget-extra themed-background-dark">
        <tr class="widget-content-light">
            <th>Row Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody class="widget-extra">
    @foreach($seos as $seo)
        <tr>
            <td>{!! $seo->row_id !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.seos.destroy', $seo->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.seos.show', [$seo->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('admin.seos.edit', [$seo->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>