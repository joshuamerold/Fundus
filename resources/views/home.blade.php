@include('standards/head')

<body class="home-body">

@include('sidebar')
@include('topbar')



    <div class="card-container">
        <div class="col-md-8">
            <div>
              <div>
                <i class="button-add-lessons" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="add-module"></span>
                </i>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                  <li><a href="/add/module">Modul hinzufügen</a></li>
		              <li><a href="/add/lesson">Lehrveranstaltung hinzufügen</a></li>
                </div>
              </div>

                @include('inc.messages')
                <!-- <a href="/add/module">Modul hinzufügen</a>
                <a href="/add/lesson">Lehrveranstaltung hinzufügen</a> -->

                @foreach($modules as $module)

                <div class="mt-3 module-card col-md-6">
                  <div class="row">
                    <div class="col-md-11"><b>{{$module->name}}</b><br>
                    </div>
                    <div class="justify-content-end dropdown">
                      <i class="fa fa-caret-down"></i>
                      <div class="dropdown-content">
                        <a href="#">Modul bearbeiten</a>
                        <a href="#">Modul löschen</a>
                      </div>
                    </div>
                  </div>
                    <hr>
                    @foreach($lessons as $lesson)
                      @if($lesson->moduleid == $module->id)
                        <a href="/{{$lesson->id}}/show/zusammenfassung">{{$lesson->lessonname}}</a><br>
                        <p>{{$lesson->professorname}}</p>
                      @endif
                    @endforeach

                </div>
                @endforeach
                <!-- ->with('users',$user)->with('courses', $courses)->with('modules', $modules)->with('lessons', $lessons); -->
            </div>
        </div>
    </div>

</body>
