<!-- User Settings, modal which opens from Settings link (found in top right user menu) and the Cog link (found in sidebar user info) -->
<div id="modal-user-settings" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-center">
                <h2 class="modal-title"><i class="fa fa-pencil"></i> Settings</h2>
            </div>
            <!-- END Modal Header -->

            <!-- Modal Body -->
            <div class="modal-body">
                {!! Form::open(['url' => ['/api/profile', Auth::user()->id], 'class' => 'form-horizontal form-bordered', 'id' => 'profile_user']) !!}
                   
                    <!-- Block Tabs -->
                    <div class="block">
                        <!-- Block Tabs Title -->
                        <div class="block-title">
                            <ul class="nav nav-tabs" data-toggle="tabs" style="margin: 0; padding: 0;">
                                <li class="active"><a href="#user_user">User</a></li>
                                <li><a href="#user_password">Password</a></li>
                                <li><a href="#user_details">Details</a></li>
                                <li><a href="#user_themes">Themes</a></li>
                            </ul>
                        </div>
                        <!-- END Block Tabs Title -->

                        <!-- Tabs Content -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="user_user">
                                <fieldset>
                                    <legend>Vital Info</legend>
                                    <div class="form-group col-sm-6 {{$errors->has('name') ? 'has-error' : ''}}">
                                        <label class="col-md-4 control-label">Name</label>
                                        <div class="col-md-8">
                                            <input type="text" autocomplete="name" name="name" class="form-control" value="{{ Auth::user()->name }}">
                                            @if ($errors->has('name'))
                                                <span class="help-block">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-6 {{$errors->has('lastname') ? 'has-error' : ''}}">
                                        <label class="col-md-2 control-label">Last Name</label>
                                        <div class="col-md-10">
                                            <input type="text" autocomplete="lastname" name="lastname" class="form-control" value="{{ Auth::user()->lastname }}">
                                            @if ($errors->has('lastname'))
                                                <span class="help-block">{{ $errors->first('lastname') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-12 {{$errors->has('email') ? 'has-error' : ''}}">
                                        <label class="col-md-2 control-label" for="user-settings-email">Email</label>
                                        <div class="col-md-10">
                                            <input type="email" autocomplete="email" name="email" class="form-control" value="{{ Auth::user()->email }}">
                                            @if ($errors->has('email'))
                                                <span class="help-block">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="tab-pane" id="user_password">
                                <fieldset>
                                    <legend>Password Update</legend>
                                    <div class="form-group {{$errors->has('password') ? 'has-error' : ''}}">
                                        <label class="col-md-4 control-label" for="password">New Password</label>
                                        <div class="col-md-8">
                                            <input type="password" autocomplete="off" name="password" class="form-control" placeholder="Please choose a complex one..">
                                            @if ($errors->has('password'))
                                                <span class="help-block">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group {{$errors->has('password_confirmation') ? 'has-error' : ''}}">
                                        <label class="col-md-4 control-label" for="password_confirmation">Confirm New Password</label>
                                        <div class="col-md-8">
                                            <input type="password" autocomplete="off" name="password_confirmation" class="form-control" placeholder="..and confirm it!">
                                            @if ($errors->has('password_confirmation'))
                                                <span class="help-block">{{ $errors->first('password_confirmation') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="tab-pane" id="user_details">
                                <fieldset>
                                    <legend>Detalles del usuario</legend>
                                    <div class="form-group col-sm-6 {{$errors->has('phone') ? 'has-error' : ''}}">
                                        <label class="col-md-4 control-label">Phone</label>
                                        <div class="col-md-8">
                                            <input type="text" autocomplete="off" name="phone" class="form-control" value="{{ !isset(Auth::user()->userDetails->phone) ? old('phone') : Auth::user()->userDetails->phone }}">
                                            @if ($errors->has('phone'))
                                                <span class="help-block">{{ $errors->first('phone') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-6 {{$errors->has('fiscalCode') ? 'has-error' : ''}}">
                                        <label class="col-md-4 control-label">Fiscal Code</label>
                                        <div class="col-md-8">
                                            <input type="text" autocomplete="off" name="fiscalCode" class="form-control" value="{{ !isset(Auth::user()->userDetails->fiscal_code) ?  old('fiscalCode') : Auth::user()->userDetails->fiscal_code }}">
                                            @if ($errors->has('fiscalCode'))
                                                <span class="help-block">{{ $errors->first('fiscalCode') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-6 {{$errors->has('azienda') ? 'has-error' : ''}}">
                                        <label class="col-md-4 control-label">Empresa</label>
                                        <div class="col-md-8">
                                            <input type="text" autocomplete="off" name="azienda" class="form-control" value="{{ !isset(Auth::user()->userDetails->empresa) ?  old('azienda') : Auth::user()->userDetails->empresa }}">
                                            @if ($errors->has('azienda'))
                                                <span class="help-block">{{ $errors->first('azienda') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-6 {{$errors->has('viaNum') ? 'has-error' : ''}}">
                                        <label class="col-md-4 control-label">Número Civico</label>
                                        <div class="col-md-8">
                                            <input type="text" autocomplete="off" name="viaNum" class="form-control" value="{{ !isset(Auth::user()->userDetails->num_civic) ?  old('viaNum') : Auth::user()->userDetails->num_civic }}">
                                            @if ($errors->has('viaNum'))
                                                <span class="help-block">{{ $errors->first('viaNum') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-6 {{$errors->has('province') ? 'has-error' : ''}}">
                                        <label class="col-md-4 control-label">Provincia</label>
                                        <div class="col-md-8">
                                            <input type="text" autocomplete="off" name="province" class="form-control" value="{{ !isset(Auth::user()->userDetails->province) ?  old('province') : Auth::user()->userDetails->province }}">
                                            @if ($errors->has('province'))
                                                <span class="help-block">{{ $errors->first('province') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-6 {{$errors->has('city') ? 'has-error' : ''}}">
                                        <label class="col-md-4 control-label">Ciudad</label>
                                        <div class="col-md-8">
                                            <input type="text" autocomplete="off" name="city" class="form-control" value="{{ !isset(Auth::user()->userDetails->city) ?  old('city') : Auth::user()->userDetails->city }}">
                                            @if ($errors->has('city'))
                                                <span class="help-block">{{ $errors->first('city') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-12 {{$errors->has('address') ? 'has-error' : ''}}">
                                        <label class="col-md-2 control-label" for="address">Dirección</label>
                                        <div class="col-md-10">
                                            <input type="text" autocomplete="off" name="address" class="form-control" value="{{ !isset(Auth::user()->userDetails->address) ?  old('address') : Auth::user()->userDetails->address }}">
                                            @if ($errors->has('address'))
                                                <span class="help-block">{{ $errors->first('address') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="viaEmail" {{ isset(Auth::user()->userDetails->viaEmail) ? 'checked' : '' }}>

                                            <label class="form-check-label" for="viaEmail">
                                                Envia Email
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="viaSms" {{ isset(Auth::user()->userDetails->viaSms) ? 'checked' : '' }}>

                                            <label class="form-check-label" for="viaSms">
                                                Envia Sms
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="terms" {{ isset(Auth::user()->userDetails->terms) ? 'checked' : '' }}>

                                            <label class="form-check-label" for="terms">
                                                Terminos y Condiciones
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="tab-pane" id="user_themes">
                                <fieldset>
                                    <legend>Themes</legend>
                                    @include('layouts.admin.partials.themes')
                                </fieldset>
                            </div>
                        </div>
                        <!-- END Tabs Content -->
                    </div>
                    <!-- END Block Tabs -->

                    <div class="form-group form-actions">
                        <div class="col-xs-12 text-right">
                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                        </div>
                    </div>
                    
                {{-- </form> --}}
                {!! Form::close() !!}
            </div>
            <!-- END Modal Body -->
        </div>
    </div>
</div>
<!-- END User Settings -->

@push('scripts')
<script type="text/javascript">
/*
    $('#profile_user').submit(function (event){
        event.preventDefault();

        var $form   = $( this ),
            data    = $form.serialize(),
            url     = $form.attr( "action" );
        
        var post = $.post( url, { data: data } );

        post.done(function( data ) {
            console.log(data);
        });
    })
*/
    $('#profile_user').on('submit', function(e) {
        e.preventDefault();
        clear_inputs()
        
        $.ajax({
            type: "POST",
            url: $( this ).attr( "action" ),
            data: $(this).serialize(),

            success: function( response ) {
                alerts(response.data.status, response.message);
                $('#modal-user-settings').modal('hide');
            },
            error: function( jqXHR, textStatus, errorThrown ) {
                data = jqXHR.responseJSON.errors;
                $.each(data,function(i,error){
                    var element = $(document).find('[name="'+i+'"]');
                    element.after($('<span class="help-block">'+error[0]+'</span>'));
                    element.parents('.form-group').addClass('has-error');
                });
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