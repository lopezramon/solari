@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <h5 class="info_form text-center has-error"></h5>
                    <form method="POST" id="app_login" action="{{ url('/login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#app_login').on('submit', function(e) {
                e.preventDefault();
                clear_input();

                $.ajax({
                    type: "POST",
                    url: $( this ).attr( "action" ),
                    data: $(this).serialize(),

                    success: function( response ) {
                        window.location.href = 'http://localhost:8090/home';
                        console.log( response );
                    },
                    error: function( jqXHR, textStatus, errorThrown ) {
                        data = jqXHR.responseJSON.error;
                       if(errorThrown==='Unauthorized')
                            $('.info_form').html('Usted no esta autorizado para ingresar.');

                        $.each(data,function(i,error){
                            var element = $(document).find('[name="'+i+'"]');
                            element.after($('<span class="has-error help">'+error[0]+'</span>'));
                            element.parents('.form-group').addClass('has-error');
                            element.addClass('has-error');
                        });
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            });
        });

        function clear_input(){
            $('.info_form').html(''); 
            $('.help').html(" ");
            $('.form-group').removeClass('has-error');
            $(':input').removeClass('has-error');
        }
    </script>
@endpush

@push('css')
<style type="text/css">
    .has-error{
        color: #e74c3c;
        border-color: #e74c3c;
    }
</style>
@endpush