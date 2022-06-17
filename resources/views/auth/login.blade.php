@guest()
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="modalLogin" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <div class="modal-logo" id="modalLogin">
                    <img src="{{ asset('/images/rcu-yellow-logo.png') }}" alt="logo">
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="modal-title">
                    <h5><b>@lang('data.iniciar_sesion')</b></h5>
                    <hr id="linea">
                </div>

                <form method="POST" action="{{ route('login') }}">
                    
                    @csrf
                    <h6>Correo Electronico</h6>
                    <div class="form-group">
                        <i class="fas fa-envelope"></i>
						<input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="example@unimar.edu.ve">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <h6>Contraseña</h6>
                    <div class="form-group">
						<i class="fa fa-lock"></i>
						<input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="@lang('data.contraseña')">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                @lang('data.recuerdame')
                            </label>
                        </div>
                    </div>

                    <div class="form-group">

                        <div class="row">

                            <div class="col-6">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-outline-dark btn-block btn-lg" href="{{ route('password.request') }}">
                                        @lang('data.olvido_contraseña')
                                    </a>
                                @endif
                            </div>

                            <div class="col-6">
                                <button type="submit" class="btn btn-primary btn-block btn-lg">
                                    @lang('data.acceso')
                                </button>
                            </div>

                        </div>

                    </div>

                </form>

            </div>

        </div>
    </div>
</div>

@endguest
