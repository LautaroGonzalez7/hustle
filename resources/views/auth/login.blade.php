@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-8">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header justify-center">
                    <h2 class="primary-color">{{ __('Iniciar sesion') }}</h2>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="col-md-12 justify-center">
                            <div class="col-md-6">
                                <label for="email">{{ __('Correo electronico') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <label for="password" class="mt-3">{{ __('Contrasenia') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input class="form-check-input mt-3" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label mt-3" for="remember">
                                    {{ __('Recuerdame') }}
                                </label>

                                <div class="mt-4">
                                    <button type="submit" class="primary-btn w-100">
                                        {{ __('Acceder') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                                <div>
                                    <a href="{{route('register')}}" type="submit" class="secondary-btn w-100 mt-2">
                                        {{ __('Registrarse') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
