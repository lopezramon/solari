@extends('layouts.admin.app')

@section('content')
   @include('layouts.admin.partials.dashboard-header-top', [
       'title'         =>   tags()['back_module_users_user_title'],
       'subtitle'      =>   'Search',
       'icon'          =>   'fa fa-cogs',
       'breadcrumb'    =>   array (
                               array (
                                   'title' => tags()['general_home'],
                                   'route' => 'home'
                               ),
                               array (
                                   'title' => tags()['back_module_users_user_title'],
                                   'route' => 'admin.role.index'
                               ),
                               array (
                                   'title' => tags()['general_edit'],
                               ),
                            )
   ])

    <div class="block full">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    @if(!isset($user))
                        {!! Form::open(['route' => ['admin.user.search'], 'method' => 'post']) !!}

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    {!! Form::label('email', 'Email:') !!}
                                    <div class="input-group">
                                        {!! Form::text('email', null, ['class' => 'form-control']) !!}
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>

                        {!! Form::close() !!}
                    @else
                        {!! Form::open(['route' => ['admin.role.to.user', $user->id], 'method' => 'post']) !!}
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <h3 class="text-center">Asignar roles al usuario:</h3>
                                    <h2 class="text-center">{{$user->name}} {{!empty($user->lastname)?', '. $user->lastname:''}} <small class="h5">
                                        <a id="delete_user" data-user_id="{{ $user->id }}" href="javascript:void(0)">Darse de baja.</a>
                                    </small></h2>
                                    
                                </div>
                            </div>
                            @foreach($roles as $role)
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        @php $flag=false; @endphp
                                        @foreach($user->getRoles() as $userRoles)
                                            @if($userRoles == $role->slug)
                                                @php $flag=true; @endphp
                                            @endif
                                        @endforeach
                                        <label>
                                            {!! Form::checkbox('role[]', $role->id, $flag, ['id'=>$role->id]) !!}
                                            {!! Form::label('role[]', $role->name) !!}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="text-center">
                                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                                        <a href="{!! route('admin.user.get.search') !!}" class="btn btn-default">{{ tags()['general_back'] }}</a>
                                    </div>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script type="text/javascript">
    $('#delete_user').on('click', function(e) {
        $.ajax({
            type: "GET",
            url:  "/admin/delete/user/" + $( this ).data( "user_id" ),

            success: function( response ) {
                alerts(response.status, response.message);
                window.location.href = "/admin/search/user";
            },
            error: function( jqXHR, textStatus, errorThrown ) {
                alerts(response.status, response.message);
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    function clear_inputs() {
        $('.help-block').html('');
        $('.form-group').removeClass('has-error');
    }
</script>
@endpush
