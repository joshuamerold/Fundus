<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Fundus') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

@include('inc.messages')
<body class="login-body">
    <div class="circle">
    </div>
    <div class="row justify-content-around card-row">
        <div class="col-md-3">
            <div>
                <h2 class="login-title">{{ __('Willkommen zurück!') }}</h2>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row justify-content-around">
                            <div>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="{{ __('E-Mail') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row justify-content-around">
                            <div>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Passwort') }}" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <div class="form-group row justify-content-around">
                                <div>
                                  <button type="submit" class="btn btn-outline-light">
                                      {{ __('Anmelden') }}
                                  </button>
                                  @if (Route::has('password.request'))
                                </div>
                            </div>
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Passwort vergessen?') }}
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- andere col -->

        <div class="col-md-3">
            <div>
                <h2>{{ __('Registriere dich jetzt!') }}</h2>
                <div class="card-body ">
                    <form method="POST" action="/register/create">
                        @csrf
                        <div class="form-group row justify-content-around">
                            <div>
                                <input id="register_name" type="text" class="form-control @error('register_name') is-invalid @enderror" name="register_name" value="{{ old('register_name') }}" required autocomplete="name" placeholder="{{ __('Name') }}" autofocus>
                                @error('register_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row justify-content-around">
                            <div>
                                <input id="register_email" type="email" class="form-control @error('register_email') is-invalid @enderror" name="register_email" value="{{ old('register_email') }}" placeholder="{{ __('E-Mail') }}" required autocomplete="email">
                                @error('register_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row justify-content-around">
                            <div>
                                <input id="register_password" type="password" class="form-control @error('register_password') is-invalid @enderror" name="register_password" placeholder="{{ __('Passwort') }}" required autocomplete="new-password">
                                @error('register_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <input style="display:none;"type="text" id="register_courseid" name="register_courseid" value="1">
                        <div class="form-group row justify-content-around">
                            <div>
                                <input id="password-confirm" type="password" class="form-control" name="register_password_confirmation" placeholder="{{ __('Passwort wiederholen') }}" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row justify-content-around">
                            <div>
                                <button type="submit" class="btn btn-register">
                                    {{ __("Los geht's!") }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>
