<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="home-body">


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>

                @include('inc.messages')
                <a href="/profile/{{$user->username}}">Profil anzeigen</a>
                <a href="/add/module">Modul hinzufügen</a>
                <a href="/add/lesson">Lehrveranstaltung hinzufügen</a>

                Name: {{$user->username}} <br>
                Course: {{$course->name}} <br><br>

                @foreach($modules as $module)
                <div class="mt-5">

                Modulname: {{$module->name}}<br>
                  @foreach($lessons as $lesson)
                    @if($lesson->moduleid == $module->id)
                      <a href="/{{$lesson->id}}/show/zusammenfassung">{{$lesson->lessonname}}</a>, {{$lesson->professorname}}<br>
                    @endif
                  @endforeach
                </div>
                @endforeach
                <!-- ->with('users',$user)->with('courses', $courses)->with('modules', $modules)->with('lessons', $lessons); -->
            </div>
        </div>
    </div>
</div>

</body>
