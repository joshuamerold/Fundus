@include('standards/head')
<body class="home-body">
@include('sidebar')
@include('topbar')
@if(!$alreadyAdmins)
  <div class="card-container">
    <div class="col-md-8">
      <div>
        <div class="inner-container">
          <!-- Das hier erscheint, wenn noch keine Kurssprecher bestimmt wurden. -->
          <div class="speaker-card">
            <h2>Bitte Kurssprecher festlegen</h2>
            <p>
              Um alle Inhalte von Fundus zu nutzen, müssen die Kurssprecher bestimmt werden.<br>
              Bitte wählen Sie die Kurssprecher aus der Benutzerliste unten aus.<br>
              Sollte sich die Kurssprecher nicht in der Liste befinden, fordern Sie diese bitte auf sich zu registrieren.
            </p>
            <form class="" action="/add/adminuser/{{$user->coursename}}" method="post">
              @csrf
              Kurssprecher bestimmen: <br>
              <select id="adminuser1" name="adminuser1">
                @foreach($allCourseUsers as $allCourseUser)
                Kurssprecher bestimmen: <br>
                <option value="{{$allCourseUser->id}}">{{$allCourseUser->username}}</option>
                @endforeach
              </select> <br>
              Stellvertretenden Kurssprecher bestimmen: <br>
              <select id="adminuser2" name="adminuser2">
                @foreach($allCourseUsers as $allCourseUser)

                <option value="{{$allCourseUser->id}}">{{$allCourseUser->username}}</option>
                @endforeach
              </select>
            </br><button type="submit" name="button" value="bestimmen">bestimmen</button>
            </form>
          </div>


          <!-- Alle Inhalte die für jeden mit hinterlegten Kurssprecher hinterlegt sind. -->
          <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
            <li><a href="/add/module">Modul hinzufügen</a></li>
            <li><a href="/add/lesson">Lehrveranstaltung hinzufügen</a></li>
          </div>
        </div>

          <!-- <a href="/add/module">Modul hinzufügen</a>
          <a href="/add/lesson">Lehrveranstaltung hinzufügen</a> -->


          <!-- ->with('users',$user)->with('courses', $courses)->with('modules', $modules)->with('lessons', $lessons); -->
      </div>
    </div>

  </div>
  @else

  <section class="lists-container">
  	<div class="list">
      <b class="list-title">1. Semester
        <a href="/1/add/lesson"><i class="button-add-lessons" type="button" id="dropdownMenu2" aria-haspopup="true" aria-expanded="false">
        <span class="add-module"></span></a>
      </i></b>
  		<ul class="list-items">
        @foreach($modules as $module)
        @if($module->semester === 1)
        <li>
          <div class="row">
            <div class="col-md-10"><b>{{$module->name}}</b><br>
            </div>
            @if($module->creatoruserid == Auth::user()->id || Auth::user()->rights == "admin")
            <div class="col-md-1 dropdown">
              <!-- <i class="fa fa-caret-down"></i> -->
              <button class="dropdown-toggle dark-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>

              <div class="dropdown-menu">
                <a class="no-link" href="/edit/module/{{$module->id}}"><button class="dropdown-item">Modul bearbeiten</button></a>

                <button class="dropdown-item"><form action="/delete/module/{{$module->id}}" method="post">@csrf<input class="delete-module" type="submit" value="Module löschen"/></form></button>
              </div>
            </div>
            @endif
          </div>
            <hr>
            @foreach($lessons as $lesson)
              @if($lesson->moduleid == $module->id)
              <div class="row">
              <div class="col-md-7">
                <a href="/{{$lesson->id}}/show" class="lesson-name">{{$lesson->lessonname}}</a>
                <!-- Hier Status, ob bereits etwas hochgeladen -->
                @php
                  $settedFileZ = true;
                  $settedFileA = true;
                  $settedFileK = true;
                @endphp
              </div>
              <div class="col-md-5" style="text-align: right;">
                <span>
                  @foreach($files as $file)
                    @if($file->type === "zusammenfassung" && $file->lessonid === $lesson->id)
                      <img src="/assets/Zusammenfassung.svg" alt="Zusammenfassung vorhanden" title="Zusammenfassung vorhanden" class="type-pic">
                      @php
                      $settedFileZ = false;
                      @endphp
                      @break
                    @endif
                  @endforeach
                  @if($settedFileZ)
                    <img src="/assets/Zusammenfassung_grau.svg" alt="Zusammenfassung fehlt" title="Noch keine Zusammenfassung vorhanden" class="type-pic">
                  @endif
                </span>
                <span>
                  @foreach($files as $file)
                    @if($file->type === "altklausur" && $file->lessonid === $lesson->id)
                        <img src="/assets/Altklausur.svg" alt="Altklausur vorhanden" title="Altklausur vorhanden" class="type-pic">
                      @php
                      $settedFileA = false;
                      @endphp
                      @break
                    @endif
                  @endforeach
                  @if($settedFileA)
                    <img src="/assets/Altklausur_grau.svg" alt="Altklausur fehlt" title="Noch keine Altklausur vorhanden" class="type-pic">
                  @endif
                </span>
                <span>
                  @foreach($files as $file)
                    @if($file->type === "karteikarte" && $file->lessonid === $lesson->id)
                      <img src="/assets/Karteikarten.svg" alt="Karteikarten vorhanden" title="Karteikarten vorhanden" class="type-pic">
                      @php
                      $settedFileK = false;
                      @endphp
                      @break
                    @endif
                  @endforeach
                  @if($settedFileK)
                    <img src="/assets/Karteikarten_grau.svg" alt="Karteikarten fehlen" title="Noch keine Karteikarten vorhanden" class="type-pic">
                  @endif
                </span>
                <span>
                  @if($lesson->creatoruserid == Auth::user()->id || Auth::user()->rights == "admin")
                  <div class="dropdown">
                    <!-- <i class="fa fa-caret-down"></i> -->
                    <button class="dropdown-toggle dark-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>

                    <div class="dropdown-menu">
                      <a class="no-link" href="/{{$lesson->id}}/edit/show"><button class="dropdown-item">Lehrveranstaltung bearbeiten</button></a>

                      <button class="dropdown-item"><form action="/{{$lesson->id}}/edit/show/delete" method="post">@csrf<input class="delete-module" type="submit" value="Lehrveranstaltung löschen"/></form></button>
                    </div>
                  </div>
                  @endif
                </span>
              </div>
            </div>
                <p>{{$lesson->professorname}}</p>
              @endif
            @endforeach
        </li>
        @endif
        @endforeach
  		</ul>

  	</div>
  	<div class="list">
  		<b class="list-title">2. Semester
        <a href="/2/add/lesson"><i class="button-add-lessons" type="button" id="dropdownMenu2" aria-haspopup="true" aria-expanded="false">
        <span class="add-module"></span></a>
      </i></b>

  		<ul class="list-items">
        @foreach($modules as $module)
        @if($module->semester === 2)
        <li>
          <div class="row">
            <div class="col-md-10"><b>{{$module->name}}</b><br>
            </div>
            @if($module->creatoruserid == Auth::user()->id || Auth::user()->rights == "admin")
            <div class="col-md-1 dropdown">
              <!-- <i class="fa fa-caret-down"></i> -->
              <button class="dropdown-toggle dark-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>

              <div class="dropdown-menu">
                <a class="no-link" href="/edit/module/{{$module->id}}"><button class="dropdown-item">Modul bearbeiten</button></a>

                <button class="dropdown-item"><form action="/delete/module/{{$module->id}}" method="post">@csrf<input class="delete-module" type="submit" value="Module löschen"/></form></button>
              </div>
            </div>
            @endif
          </div>
            <hr>
            @foreach($lessons as $lesson)
              @if($lesson->moduleid == $module->id)
              <div class="row">
                <div class="col-md-7">
                  <a href="/{{$lesson->id}}/show" class="lesson-name">{{$lesson->lessonname}}</a>
                  <!-- Hier Status, ob bereits etwas hochgeladen -->
                  @php
                    $settedFileZ = true;
                    $settedFileA = true;
                    $settedFileK = true;
                  @endphp
                </div>
                <div class="col-md-5" style="text-align: right;">
                  <span>
                    @foreach($files as $file)
                      @if($file->type === "zusammenfassung" && $file->lessonid === $lesson->id)
                      <img src="/assets/Zusammenfassung.svg" alt="Zusammenfassung vorhanden" title="Zusammenfassung vorhanden" class="type-pic">
                      @php
                      $settedFileZ = false;
                      @endphp
                      @break
                    @endif
                  @endforeach
                  @if($settedFileZ)
                    <img src="/assets/Zusammenfassung_grau.svg" alt="Zusammenfassung fehlt" title="Noch keine Zusammenfassung vorhanden" class="type-pic">
                  @endif
                </span>
                <span>
                  @foreach($files as $file)
                    @if($file->type === "altklausur" && $file->lessonid === $lesson->id)
                        <img src="/assets/Altklausur.svg" alt="Altklausur vorhanden" title="Altklausur vorhanden" class="type-pic">
                      @php
                      $settedFileA = false;
                      @endphp
                      @break
                    @endif
                  @endforeach
                  @if($settedFileA)
                    <img src="/assets/Altklausur_grau.svg" alt="Altklausur fehlt" title="Noch keine Altklausur vorhanden" class="type-pic">
                  @endif
                </span>
                <span>
                  @foreach($files as $file)
                    @if($file->type === "karteikarte" && $file->lessonid === $lesson->id)
                      <img src="/assets/Karteikarten.svg" alt="Karteikarten vorhanden" title="Karteikarten vorhanden" class="type-pic">
                      @php
                      $settedFileK = false;
                      @endphp
                      @break
                    @endif
                  @endforeach
                  @if($settedFileK)
                    <img src="/assets/Karteikarten_grau.svg" alt="Karteikarten fehlen" title="Noch keine Karteikarten vorhanden" class="type-pic">
                    @endif
                  </span>
                  <span>
                    @if($lesson->creatoruserid == Auth::user()->id || Auth::user()->rights == "admin")
                    <div class="dropdown">
                      <!-- <i class="fa fa-caret-down"></i> -->
                      <button class="dropdown-toggle dark-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>

                      <div class="dropdown-menu">
                        <a class="no-link" href="/{{$lesson->id}}/edit/show"><button class="dropdown-item">Lehrveranstaltung bearbeiten</button></a>

                        <button class="dropdown-item"><form action="/{{$lesson->id}}/edit/show/delete" method="post">@csrf<input class="delete-module" type="submit" value="Lehrveranstaltung löschen"/></form></button>
                      </div>
                    </div>
                    @endif
                  </span>
                </div>
              </div>
                  <p>{{$lesson->professorname}}</p>
              @endif
            @endforeach
        </li>
        @endif
        @endforeach
  		</ul>

  	</div>

  	<div class="list">
      <b class="list-title">3. Semester
        <a href="/3/add/lesson"><i class="button-add-lessons" type="button" id="dropdownMenu2" aria-haspopup="true" aria-expanded="false">
        <span class="add-module"></span></a>
      </i></b>
  		<ul class="list-items">
        @foreach($modules as $module)
        @if($module->semester === 3)
        <li>
          <div class="row">
            <div class="col-md-10"><b>{{$module->name}}</b><br>
            </div>
            @if($module->creatoruserid == Auth::user()->id || Auth::user()->rights == "admin")
            <div class="col-md-1 dropdown">
              <!-- <i class="fa fa-caret-down"></i> -->
              <button class="dropdown-toggle dark-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>

              <div class="dropdown-menu">
                <a class="no-link" href="/edit/module/{{$module->id}}"><button class="dropdown-item">Modul bearbeiten</button></a>

                <button class="dropdown-item"><form action="/delete/module/{{$module->id}}" method="post">@csrf<input class="delete-module" type="submit" value="Module löschen"/></form></button>
              </div>
            </div>
            @endif
          </div>
            <hr>
            @foreach($lessons as $lesson)
              @if($lesson->moduleid == $module->id)
              <div class="row">
                <div class="col-md-7">
                  <a href="/{{$lesson->id}}/show" class="lesson-name">{{$lesson->lessonname}}</a>
                  <!-- Hier Status, ob bereits etwas hochgeladen -->
                  @php
                    $settedFileZ = true;
                    $settedFileA = true;
                    $settedFileK = true;
                  @endphp
                </div>
                <div class="col-md-5" style="text-align: right;">
                  <span>
                    @foreach($files as $file)
                      @if($file->type === "zusammenfassung" && $file->lessonid === $lesson->id)
                      <img src="/assets/Zusammenfassung.svg" alt="Zusammenfassung vorhanden" title="Zusammenfassung vorhanden" class="type-pic">
                      @php
                      $settedFileZ = false;
                      @endphp
                      @break
                    @endif
                  @endforeach
                  @if($settedFileZ)
                    <img src="/assets/Zusammenfassung_grau.svg" alt="Zusammenfassung fehlt" title="Noch keine Zusammenfassung vorhanden" class="type-pic">
                  @endif
                </span>
                <span>
                  @foreach($files as $file)
                    @if($file->type === "altklausur" && $file->lessonid === $lesson->id)
                        <img src="/assets/Altklausur.svg" alt="Altklausur vorhanden" title="Altklausur vorhanden" class="type-pic">
                      @php
                      $settedFileA = false;
                      @endphp
                      @break
                    @endif
                  @endforeach
                  @if($settedFileA)
                    <img src="/assets/Altklausur_grau.svg" alt="Altklausur fehlt" title="Noch keine Altklausur vorhanden" class="type-pic">
                  @endif
                </span>
                <span>
                  @foreach($files as $file)
                    @if($file->type === "karteikarte" && $file->lessonid === $lesson->id)
                      <img src="/assets/Karteikarten.svg" alt="Karteikarten vorhanden" title="Karteikarten vorhanden" class="type-pic">
                      @php
                      $settedFileK = false;
                      @endphp
                      @break
                    @endif
                  @endforeach
                  @if($settedFileK)
                    <img src="/assets/Karteikarten_grau.svg" alt="Karteikarten fehlen" title="Noch keine Karteikarten vorhanden" class="type-pic">
                    @endif
                  </span>
                  <span>
                    @if($lesson->creatoruserid == Auth::user()->id || Auth::user()->rights == "admin")
                    <div class="dropdown">
                      <!-- <i class="fa fa-caret-down"></i> -->
                      <button class="dropdown-toggle dark-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>

                      <div class="dropdown-menu">
                        <a class="no-link" href="/{{$lesson->id}}/edit/show"><button class="dropdown-item">Lehrveranstaltung bearbeiten</button></a>

                        <button class="dropdown-item"><form action="/{{$lesson->id}}/edit/show/delete" method="post">@csrf<input class="delete-module" type="submit" value="Lehrveranstaltung löschen"/></form></button>
                      </div>
                    </div>
                    @endif
                  </span>
                </div>
              </div>
                  <p>{{$lesson->professorname}}</p>
              @endif
            @endforeach
        </li>
        @endif
        @endforeach
  		</ul>
  	</div>
  	<div class="list">
      <b class="list-title">4. Semester
        <a href="/4/add/lesson"><i class="button-add-lessons" type="button" id="dropdownMenu2" aria-haspopup="true" aria-expanded="false">
        <span class="add-module"></span></a>
      </i></b>
  		<ul class="list-items">
        @foreach($modules as $module)
        @if($module->semester === 4)
        <li>
          <div class="row">
            <div class="col-md-10"><b>{{$module->name}}</b><br>
            </div>
            @if($module->creatoruserid == Auth::user()->id || Auth::user()->rights == "admin")
            <div class="col-md-1 dropdown">
              <!-- <i class="fa fa-caret-down"></i> -->
              <button class="dropdown-toggle dark-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>

              <div class="dropdown-menu">
                <a class="no-link" href="/edit/module/{{$module->id}}"><button class="dropdown-item">Modul bearbeiten</button></a>

                <button class="dropdown-item"><form action="/delete/module/{{$module->id}}" method="post">@csrf<input class="delete-module" type="submit" value="Module löschen"/></form></button>
              </div>
            </div>
            @endif
          </div>
            <hr>
            @foreach($lessons as $lesson)
              @if($lesson->moduleid == $module->id)
              <div class="row">
                <div class="col-md-7">
                  <a href="/{{$lesson->id}}/show" class="lesson-name">{{$lesson->lessonname}}</a>
                  <!-- Hier Status, ob bereits etwas hochgeladen -->
                  @php
                    $settedFileZ = true;
                    $settedFileA = true;
                    $settedFileK = true;
                  @endphp
                </div>
                <div class="col-md-5" style="text-align: right;">
                  <span>
                    @foreach($files as $file)
                      @if($file->type === "zusammenfassung" && $file->lessonid === $lesson->id)
                      <img src="/assets/Zusammenfassung.svg" alt="Zusammenfassung vorhanden" title="Zusammenfassung vorhanden" class="type-pic">
                      @php
                      $settedFileZ = false;
                      @endphp
                      @break
                    @endif
                  @endforeach
                  @if($settedFileZ)
                    <img src="/assets/Zusammenfassung_grau.svg" alt="Zusammenfassung fehlt" title="Noch keine Zusammenfassung vorhanden" class="type-pic">
                  @endif
                </span>
                <span>
                  @foreach($files as $file)
                    @if($file->type === "altklausur" && $file->lessonid === $lesson->id)
                        <img src="/assets/Altklausur.svg" alt="Altklausur vorhanden" title="Altklausur vorhanden" class="type-pic">
                      @php
                      $settedFileA = false;
                      @endphp
                      @break
                    @endif
                  @endforeach
                  @if($settedFileA)
                    <img src="/assets/Altklausur_grau.svg" alt="Altklausur fehlt" title="Noch keine Altklausur vorhanden" class="type-pic">
                  @endif
                </span>
                <span>
                  @foreach($files as $file)
                    @if($file->type === "karteikarte" && $file->lessonid === $lesson->id)
                      <img src="/assets/Karteikarten.svg" alt="Karteikarten vorhanden" title="Karteikarten vorhanden" class="type-pic">
                      @php
                      $settedFileK = false;
                      @endphp
                      @break
                    @endif
                  @endforeach
                  @if($settedFileK)
                    <img src="/assets/Karteikarten_grau.svg" alt="Karteikarten fehlen" title="Noch keine Karteikarten vorhanden" class="type-pic">
                    @endif
                  </span>
                  <span>
                    @if($lesson->creatoruserid == Auth::user()->id || Auth::user()->rights == "admin")
                    <div class="dropdown">
                      <!-- <i class="fa fa-caret-down"></i> -->
                      <button class="dropdown-toggle dark-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>

                      <div class="dropdown-menu">
                        <a class="no-link" href="/{{$lesson->id}}/edit/show"><button class="dropdown-item">Lehrveranstaltung bearbeiten</button></a>

                        <button class="dropdown-item"><form action="/{{$lesson->id}}/edit/show/delete" method="post">@csrf<input class="delete-module" type="submit" value="Lehrveranstaltung löschen"/></form></button>
                      </div>
                    </div>
                    @endif
                  </span>
                </div>
              </div>
                  <p>{{$lesson->professorname}}</p>
              @endif
            @endforeach
        </li>
        @endif
        @endforeach
  		</ul>
  	</div>
  	<div class="list">
      <b class="list-title">5. Semester
        <a href="/5/add/lesson"><i class="button-add-lessons" type="button" id="dropdownMenu2" aria-haspopup="true" aria-expanded="false">
        <span class="add-module"></span></a>
      </i></b>
  		<ul class="list-items">
        @foreach($modules as $module)
        @if($module->semester === 5)
        <li>
          <div class="row">
            <div class="col-md-10"><b>{{$module->name}}</b><br>
            </div>
            @if($module->creatoruserid == Auth::user()->id || Auth::user()->rights == "admin")
            <div class="col-md-1 dropdown">
              <!-- <i class="fa fa-caret-down"></i> -->
              <button class="dropdown-toggle dark-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>

              <div class="dropdown-menu">
                <a class="no-link" href="/edit/module/{{$module->id}}"><button class="dropdown-item">Modul bearbeiten</button></a>

                <button class="dropdown-item"><form action="/delete/module/{{$module->id}}" method="post">@csrf<input class="delete-module" type="submit" value="Module löschen"/></form></button>
              </div>
            </div>
            @endif
          </div>
            <hr>
            @foreach($lessons as $lesson)
              @if($lesson->moduleid == $module->id)
              <div class="row">
                <div class="col-md-7">
                  <a href="/{{$lesson->id}}/show" class="lesson-name">{{$lesson->lessonname}}</a>
                  <!-- Hier Status, ob bereits etwas hochgeladen -->
                  @php
                    $settedFileZ = true;
                    $settedFileA = true;
                    $settedFileK = true;
                  @endphp
                </div>
                <div class="col-md-5" style="text-align: right;">
                  <span>
                    @foreach($files as $file)
                      @if($file->type === "zusammenfassung" && $file->lessonid === $lesson->id)
                      <img src="/assets/Zusammenfassung.svg" alt="Zusammenfassung vorhanden" title="Zusammenfassung vorhanden" class="type-pic">
                      @php
                      $settedFileZ = false;
                      @endphp
                      @break
                    @endif
                  @endforeach
                  @if($settedFileZ)
                    <img src="/assets/Zusammenfassung_grau.svg" alt="Zusammenfassung fehlt" title="Noch keine Zusammenfassung vorhanden" class="type-pic">
                  @endif
                </span>
                <span>
                  @foreach($files as $file)
                    @if($file->type === "altklausur" && $file->lessonid === $lesson->id)
                        <img src="/assets/Altklausur.svg" alt="Altklausur vorhanden" title="Altklausur vorhanden" class="type-pic">
                      @php
                      $settedFileA = false;
                      @endphp
                      @break
                    @endif
                  @endforeach
                  @if($settedFileA)
                    <img src="/assets/Altklausur_grau.svg" alt="Altklausur fehlt" title="Noch keine Altklausur vorhanden" class="type-pic">
                  @endif
                </span>
                <span>
                  @foreach($files as $file)
                    @if($file->type === "karteikarte" && $file->lessonid === $lesson->id)
                      <img src="/assets/Karteikarten.svg" alt="Karteikarten vorhanden" title="Karteikarten vorhanden" class="type-pic">
                      @php
                      $settedFileK = false;
                      @endphp
                      @break
                    @endif
                  @endforeach
                  @if($settedFileK)
                    <img src="/assets/Karteikarten_grau.svg" alt="Karteikarten fehlen" title="Noch keine Karteikarten vorhanden" class="type-pic">
                    @endif
                  </span>
                  <span>
                    @if($lesson->creatoruserid == Auth::user()->id || Auth::user()->rights == "admin")
                    <div class="dropdown">
                      <!-- <i class="fa fa-caret-down"></i> -->
                      <button class="dropdown-toggle dark-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>

                      <div class="dropdown-menu">
                        <a class="no-link" href="/{{$lesson->id}}/edit/show"><button class="dropdown-item">Lehrveranstaltung bearbeiten</button></a>

                        <button class="dropdown-item"><form action="/{{$lesson->id}}/edit/show/delete" method="post">@csrf<input class="delete-module" type="submit" value="Lehrveranstaltung löschen"/></form></button>
                      </div>
                    </div>
                    @endif
                  </span>
                </div>
              </div>
                  <p>{{$lesson->professorname}}</p>
              @endif
            @endforeach
        </li>
        @endif
        @endforeach
  		</ul>
  	</div>
  	<div class="list">
      <b class="list-title">6. Semester
        <a href="/6/add/lesson"><i class="button-add-lessons" type="button" id="dropdownMenu2" aria-haspopup="true" aria-expanded="false">
        <span class="add-module"></span></a>
      </i></b>
  		<ul class="list-items">
        @foreach($modules as $module)
        @if($module->semester === 6)
        <li>
          <div class="row">
            <div class="col-md-10"><b>{{$module->name}}</b><br>
            </div>
            @if($module->creatoruserid == Auth::user()->id || Auth::user()->rights == "admin")
            <div class="col-md-1 dropdown">
              <!-- <i class="fa fa-caret-down"></i> -->
              <button class="dropdown-toggle dark-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>

              <div class="dropdown-menu">
                <a class="no-link" href="/edit/module/{{$module->id}}"><button class="dropdown-item">Modul bearbeiten</button></a>

                <button class="dropdown-item"><form action="/delete/module/{{$module->id}}" method="post">@csrf<input class="delete-module" type="submit" value="Module löschen"/></form></button>
              </div>
            </div>
            @endif
          </div>
            <hr>
            @foreach($lessons as $lesson)
              @if($lesson->moduleid == $module->id)
              <div class="row">
                <div class="col-md-7">
                  <a href="/{{$lesson->id}}/show" class="lesson-name">{{$lesson->lessonname}}</a>
                  <!-- Hier Status, ob bereits etwas hochgeladen -->
                  @php
                    $settedFileZ = true;
                    $settedFileA = true;
                    $settedFileK = true;
                  @endphp
                </div>
                <div class="col-md-5" style="text-align: right;">
                  <span>
                    @foreach($files as $file)
                      @if($file->type === "zusammenfassung" && $file->lessonid === $lesson->id)
                      <img src="/assets/Zusammenfassung.svg" alt="Zusammenfassung vorhanden" title="Zusammenfassung vorhanden" class="type-pic">
                      @php
                      $settedFileZ = false;
                      @endphp
                      @break
                    @endif
                  @endforeach
                  @if($settedFileZ)
                    <img src="/assets/Zusammenfassung_grau.svg" alt="Zusammenfassung fehlt" title="Noch keine Zusammenfassung vorhanden" class="type-pic">
                  @endif
                </span>
                <span>
                  @foreach($files as $file)
                    @if($file->type === "altklausur" && $file->lessonid === $lesson->id)
                        <img src="/assets/Altklausur.svg" alt="Altklausur vorhanden" title="Altklausur vorhanden" class="type-pic">
                      @php
                      $settedFileA = false;
                      @endphp
                      @break
                    @endif
                  @endforeach
                  @if($settedFileA)
                    <img src="/assets/Altklausur_grau.svg" alt="Altklausur fehlt" title="Noch keine Altklausur vorhanden" class="type-pic">
                  @endif
                </span>
                <span>
                  @foreach($files as $file)
                    @if($file->type === "karteikarte" && $file->lessonid === $lesson->id)
                      <img src="/assets/Karteikarten.svg" alt="Karteikarten vorhanden" title="Karteikarten vorhanden" class="type-pic">
                      @php
                      $settedFileK = false;
                      @endphp
                      @break
                    @endif
                  @endforeach
                  @if($settedFileK)
                    <img src="/assets/Karteikarten_grau.svg" alt="Karteikarten fehlen" title="Noch keine Karteikarten vorhanden" class="type-pic">
                    @endif
                  </span>
                  <span>
                    @if($lesson->creatoruserid == Auth::user()->id || Auth::user()->rights == "admin")
                    <div class="dropdown">
                      <!-- <i class="fa fa-caret-down"></i> -->
                      <button class="dropdown-toggle dark-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>

                      <div class="dropdown-menu">
                        <a class="no-link" href="/{{$lesson->id}}/edit/show"><button class="dropdown-item">Lehrveranstaltung bearbeiten</button></a>

                        <button class="dropdown-item"><form action="/{{$lesson->id}}/edit/show/delete" method="post">@csrf<input class="delete-module" type="submit" value="Lehrveranstaltung löschen"/></form></button>
                      </div>
                    </div>
                    @endif
                  </span>
                </div>
              </div>
                  <p>{{$lesson->professorname}}</p>
              @endif
            @endforeach
        </li>
        @endif
        @endforeach
  		</ul>
  	</div>
  </section>
@endif

</body>
