@extends('layouts.admin.app')

@section('content')
   @include('layouts.admin.partials.dashboard-header-top', [
       'title'         =>   tags()['back_module_users_user_title'],
       'subtitle'      =>   'Add Permission',
       'icon'          =>   'fa fa-cogs',
       'breadcrumb'    =>   array (
                               array (
                                   'title' => tags()['general_home'],
                                   'route' => 'home'
                               ),
                               array (
                                   'title' => tags()['back_module_users_user_title'],
                                   'route' => 'admin.role.create'
                               ),
                               array (
                                   'title' => tags()['general_show'],
                               ),
                            )
   ])

    <div class="block full">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::model($role, ['route' => ['admin.add.permission.to.role', $role->id], 'method' => 'post']) !!}
                        @php $module = null; @endphp
                        @foreach($permissions as $permission)
                            <div class="col-sm-6 col-sm-offset-3">
                                @if($permission->module->id != $module)
                                    @php $module = $permission->module->id; @endphp
                                    <h3 class="text-center">{{ $permission->module->name }}</h3>
                                    <hr />
                                @endif
                                <div class="form-group {{$errors->has('permissions') ? 'has-error' : ''}}">
                                    @php $flag=false; @endphp
                                    @foreach($role->permissionRoles as $permissionRoles)
                                        @if($permissionRoles->permission_id == $permission->id)
                                            @php $flag=true; @endphp
                                        @endif
                                    @endforeach
                                    <label>
                                        {!! Form::checkbox('permissions[]', $permission->id, $flag, ['id'=>$permission->id]) !!}
                                        {!! Form::label('permissions[]', $permission->name) !!}
                                    </label>
                                    @if ($errors->has('permissions'))
                                        <span class="help-block">{{ $errors->first('permissions') }}</span>
                                    @endif
                                </div>
                            </div>
                        @endforeach

                        <!-- Submit Field -->
                        <div class="col-sm-6 col-sm-offset-3">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                            <a href="{!! route('admin.role.index') !!}" class="btn btn-default">Cancel</a>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection