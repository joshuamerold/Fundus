@extends('layouts.app')

@section('content')
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

                <a href="/add/module">Modul hinzufügen</a>
                <a href="/add/lesson">Lehrveranstaltung hinzufügen</a>

                Name: {{$user->username}} <br>
                Course: {{$course->name}} <br><br>

                @foreach($modules as $module)
                <div class="mt-5">

                Modulname: {{$module->name}}<br>
                  @foreach($lessons as $lesson)
                    @if($lesson->moduleid == $module->id)
                      <a href="/{{$lesson->id}}/zusammenfassung">{{$lesson->lessonname}}</a>, {{$lesson->professorname}}<br>
                    @endif
                  @endforeach
                </div>
                @endforeach
                <!-- ->with('users',$user)->with('courses', $courses)->with('modules', $modules)->with('lessons', $lessons); -->
            </div>
        </div>
    </div>
</div>
@endsection
