@php $module = null; @endphp
<div class="row">
    <div class="col-sm-6">
        <!-- Id Field -->
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! $role->name !!}
        </div>
    </div>

    <div class="col-sm-6">
        <!-- Name Field -->
        <div class="form-group">
            {!! Form::label('description', 'Description:') !!}
            {!! $role->description !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="text-right">
            <a href="{!! route('admin.permission.to.role', $role->id) !!}" class="btn btn-default">Agregar Permisos{{-- tags()['general_back'] --}}</a>
            <a href="{!! route('admin.role.index') !!}" class="btn btn-default">{{ tags()['general_back'] }}</a>
        </div>
    </div>
</div>

<div class="row">
@if(!$role->permissionRoles->isEmpty())
    @foreach($role->permissionRoles as $permission)
        <div class="col-sm-6 col-sm-offset-3">
            @if($permission->permission->module->id != $module)
                @php $module = $permission->permission->module->id; @endphp
                <h3 class="text-center">{{ $permission->permission->module->name }}</h3>
                <hr />
            @endif
            <!-- Name Field -->
            <div class="form-group">
                {!! Form::label('permission', 'Permission:') !!}
                {!! $permission->permission->name !!}
            </div>
        </div>
    @endforeach
@endif
</div>