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
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>


@include('inc.messages')
<body class="login-body">

    <!-- <div class="circle">

    </div> -->
    <div class="outer" style="z-index:0;">
      <svg viewBox="0 0 150 150" preserveAspectRatio="xMinYMin meet">
        <g>
          <circle r="50%" cx="50%" cy="50%" class="circle-back" />
          <text x="50%" y="50%" text-anchor="middle" dy="0.3em">Fundus</text>
        </g>
      </svg>
    </div>

  <div class="row justify-content-around card-row" style="margin-top: 200px">
      <div class="col-md-3">
          <div >
              <h2 class="login-title">{{ __('Willkommen zurück!') }}</h2>
              <div class="card-body">
                  <form method="POST" action="{{ route('login') }}">
                      @csrf
                      <div class="form-group row justify-content-around">
                          <div>
                              <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="{{ __('Username') }}" required autocomplete="username" autofocus>
                          </div>
                      </div>
                      <div class="form-group row justify-content-around">
                           <div>
                               <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Passwort') }}" required autocomplete="current-password">
                          </div>
                      </div>
                        <div class="anmelden-btn-group">
                          <div class="form-group row justify-content-around">
                            <div>
                              <button type="submit" class="btn btn-outline-light btn-anmelden">
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

        <div class="col-md-3">
          <div>
            <h2>{{ __('Registriere dich jetzt!') }}</h2>
              <div class="card-body ">
                <form method="POST" action="/register/create">
                        @csrf



                        <div class="form-group row justify-content-around">
                            <div>
                                <input id="register_email" type="text" class="form-control" name="register_email" value="{{ old('register_email') }}" placeholder="{{ __('E-Mail') }}" required autocomplete="email">
                                @lehre.mosbach.dhbw.de
                            </div>
                        </div>

                        <div class="form-group row justify-content-around">
                            <select id="studygang" name="course" class="custom-select">
                                @foreach($courses as $course)
                                    <option value="{{$course->id}}">{{$course->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group row justify-content-around">
                            <div>
                               <input id="register_password" type="password" class="form-control @error('register_password') is-invalid @enderror" name="register_password" placeholder="{{ __('Passwort') }}" required autocomplete="new-password">
                            </div>
                        </div>

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
