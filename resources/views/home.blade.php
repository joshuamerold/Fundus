@include('standards/head')

<body class="home-body">
@include('sidebar')
@include('topbar')
@if(!$alreadyAdmins)
  <div class="card-container">
    <div class="col-md-8">
      <div>
        <div>
          <!-- Das hier erscheint, wenn noch keine Kurssprecher bestimmt wurden. -->
          <h2>Sie haben noch keinen Kurssprecher hinterlegt</h2>
          <p>
            Um alle Inhalte von Fundus zu nutzen, müssen die Kurssprecher bestimmt werden.<br>
            Bitte wählen Sie die Kurssprecher unten aus.<br>
            Sollte sich der Kurssprecher nicht in der Liste befinden, bitte ich Sie diese zur Registrierung zu führen.
          </p>
          <form class="" action="/add/adminuser/{{$user->coursename}}" method="post">
            @csrf
            Hier ersten Kurssprecher bestimmen: <br>
            <select id="adminuser1" name="adminuser1">
              @foreach($allCourseUsers as $allCourseUser)
              Hier ersten Kurssprecher bestimmen: <br>
              <option value="{{$allCourseUser->id}}">{{$allCourseUser->username}}</option>
              @endforeach
            </select> <br>
            Hier zweiten Kurssprecher bestimmen: <br>
            <select id="adminuser2" name="adminuser2">
              @foreach($allCourseUsers as $allCourseUser)

              <option value="{{$allCourseUser->id}}">{{$allCourseUser->username}}</option>
              @endforeach
            </select>
          </br><button type="submit" name="button" value="bestimmen">bestimmen</button>
          </form>


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
  @include('inc.messages')

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
            <div class="col-md-11"><b>{{$module->name}}</b><br>
            </div>
            @if($module->creatoruserid == Auth::user()->id || Auth::user()->rights == "admin")
            <div class="justify-content-end dropdown">
              <i class="fa fa-caret-down"></i>
              <div class="dropdown-content">
                <a href="/edit/module/{{$module->id}}">Modul bearbeiten</a>
                <form action="/delete/module/{{$module->id}}" method="post">@csrf<input type="submit" value="Module löschen"/></form>
              </div>
            </div>
            @endif
          </div>
            <hr>
            @foreach($lessons as $lesson)
              @if($lesson->moduleid == $module->id)
              <div class="row">
              <div class="col-md-9">
                <a href="/{{$lesson->id}}/show">{{$lesson->lessonname}}</a>
                <!-- Hier Status   ob bereits etwas hochgeladen -->
                @php
                  $settedFileZ = true;
                  $settedFileA = true;
                  $settedFileK = true;
                @endphp
              </div>
              <div class="col-md-3">
                <span class="">
                  @foreach($files as $file)
                    @if($file->type === "zusammenfassung" && $file->lessonid === $lesson->id)
                      <strong style="color:red">Z</strong>
                      @php
                      $settedFileZ = false;
                      @endphp
                      @break
                    @endif
                  @endforeach
                  @if($settedFileZ)
                    <strong style="color:grey">Z</strong>
                  @endif
                </span>
                <span class="">
                  @foreach($files as $file)
                    @if($file->type === "altklausur" && $file->lessonid === $lesson->id)
                      <strong style="color:red">A</strong>
                      @php
                      $settedFileA = false;
                      @endphp
                      @break
                    @endif
                  @endforeach
                  @if($settedFileA)
                    <strong style="color:grey">A</strong>
                  @endif
                </span>
                <span class="">
                  @foreach($files as $file)
                    @if($file->type === "karteikarte" && $file->lessonid === $lesson->id)
                      <strong style="color:red">K</strong>
                      @php
                      $settedFileK = false;
                      @endphp
                      @break
                    @endif
                  @endforeach
                  @if($settedFileK)
                    <strong style="color:grey">K</strong>
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
            <div class="col-md-11"><b>{{$module->name}}</b><br>
            </div>
            @if($module->creatoruserid == Auth::user()->id || Auth::user()->rights == "admin")
            <div class="justify-content-end dropdown">
              <i class="fa fa-caret-down"></i>
              <div class="dropdown-content">
                <a href="/edit/module/{{$module->id}}">Modul bearbeiten</a>
                <form action="/delete/module/{{$module->id}}" method="post">@csrf<input type="submit" value="Module löschen"/></form>
              </div>
            </div>
            @endif
          </div>
            <hr>
            @foreach($lessons as $lesson)
              @if($lesson->moduleid == $module->id)
              <div class="row">
              <div class="col-md-9">
                <a href="/{{$lesson->id}}/show">{{$lesson->lessonname}}</a>
                <!-- Hier Status ob bereits etwas hochgeladen -->
                @php
                  $settedFileZ = true;
                  $settedFileA = true;
                  $settedFileK = true;
                @endphp
              </div>
              <div class="col-md-3">
                <span class="">
                  @foreach($files as $file)
                    @if($file->type === "zusammenfassung" && $file->lessonid === $lesson->id)
                      <strong style="color:red">Z</strong>
                      @php
                      $settedFileZ = false;
                      @endphp
                      @break
                    @endif
                  @endforeach
                  @if($settedFileZ)
                    <strong style="color:grey">Z</strong>
                  @endif
                </span>
                <span class="">
                  @foreach($files as $file)
                    @if($file->type === "altklausur" && $file->lessonid === $lesson->id)
                      <strong style="color:red">A</strong>
                      @php
                      $settedFileA = false;
                      @endphp
                      @break
                    @endif
                  @endforeach
                  @if($settedFileA)
                    <strong style="color:grey">A</strong>
                  @endif
                </span>
                <span class="">
                  @foreach($files as $file)
                    @if($file->type === "karteikarte" && $file->lessonid === $lesson->id)
                      <strong style="color:red">K</strong>
                      @php
                      $settedFileK = false;
                      @endphp
                      @break
                    @endif
                  @endforeach
                  @if($settedFileK)
                    <strong style="color:grey">K</strong>
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
  		<button class="add-card-btn btn">Add a card</button>
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
            <div class="col-md-11"><b>{{$module->name}}</b><br>
            </div>
            @if($module->creatoruserid == Auth::user()->id || Auth::user()->rights == "admin")
            <div class="justify-content-end dropdown">
              <i class="fa fa-caret-down"></i>
              <div class="dropdown-content">
                <a href="/edit/module/{{$module->id}}">Modul bearbeiten</a>
                <form action="/delete/module/{{$module->id}}" method="post">@csrf<input type="submit" value="Module löschen"/></form>
              </div>
            </div>
            @endif
          </div>
            <hr>
            @foreach($lessons as $lesson)
              @if($lesson->moduleid == $module->id)
              <div class="row">
              <div class="col-md-9">
                <a href="/{{$lesson->id}}/show">{{$lesson->lessonname}}</a>
                <!-- Hier Status ob bereits etwas hochgeladen -->
                @php
                  $settedFileZ = true;
                  $settedFileA = true;
                  $settedFileK = true;
                @endphp
              </div>
              <div class="col-md-3">
                <span class="">
                  @foreach($files as $file)
                    @if($file->type === "zusammenfassung" && $file->lessonid === $lesson->id)
                      <strong style="color:red">Z</strong>
                      @php
                      $settedFileZ = false;
                      @endphp
                      @break
                    @endif
                  @endforeach
                  @if($settedFileZ)
                    <strong style="color:grey">Z</strong>
                  @endif
                </span>
                <span class="">
                  @foreach($files as $file)
                    @if($file->type === "altklausur" && $file->lessonid === $lesson->id)
                      <strong style="color:red">A</strong>
                      @php
                      $settedFileA = false;
                      @endphp
                      @break
                    @endif
                  @endforeach
                  @if($settedFileA)
                    <strong style="color:grey">A</strong>
                  @endif
                </span>
                <span class="">
                  @foreach($files as $file)
                    @if($file->type === "karteikarte" && $file->lessonid === $lesson->id)
                      <strong style="color:red">K</strong>
                      @php
                      $settedFileK = false;
                      @endphp
                      @break
                    @endif
                  @endforeach
                  @if($settedFileK)
                    <strong style="color:grey">K</strong>
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
  		<button class="add-card-btn btn">Add a card</button>
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
            <div class="col-md-11"><b>{{$module->name}}</b><br>
            </div>
            @if($module->creatoruserid == Auth::user()->id || Auth::user()->rights == "admin")
            <div class="justify-content-end dropdown">
              <i class="fa fa-caret-down"></i>
              <div class="dropdown-content">
                <a href="/edit/module/{{$module->id}}">Modul bearbeiten</a>
                <form action="/delete/module/{{$module->id}}" method="post">@csrf<input type="submit" value="Module löschen"/></form>
              </div>
            </div>
            @endif
          </div>
            <hr>
            @foreach($lessons as $lesson)
              @if($lesson->moduleid == $module->id)
              <div class="row">
              <div class="col-md-9">
                <a href="/{{$lesson->id}}/show">{{$lesson->lessonname}}</a>
                <!-- Hier Status ob bereits etwas hochgeladen -->
                @php
                  $settedFileZ = true;
                  $settedFileA = true;
                  $settedFileK = true;
                @endphp
              </div>
              <div class="col-md-3">
                <span class="">
                  @foreach($files as $file)
                    @if($file->type === "zusammenfassung" && $file->lessonid === $lesson->id)
                      <strong style="color:red">Z</strong>
                      @php
                      $settedFileZ = false;
                      @endphp
                      @break
                    @endif
                  @endforeach
                  @if($settedFileZ)
                    <strong style="color:grey">Z</strong>
                  @endif
                </span>
                <span class="">
                  @foreach($files as $file)
                    @if($file->type === "altklausur" && $file->lessonid === $lesson->id)
                      <strong style="color:red">A</strong>
                      @php
                      $settedFileA = false;
                      @endphp
                      @break
                    @endif
                  @endforeach
                  @if($settedFileA)
                    <strong style="color:grey">A</strong>
                  @endif
                </span>
                <span class="">
                  @foreach($files as $file)
                    @if($file->type === "karteikarte" && $file->lessonid === $lesson->id)
                      <strong style="color:red">K</strong>
                      @php
                      $settedFileK = false;
                      @endphp
                      @break
                    @endif
                  @endforeach
                  @if($settedFileK)
                    <strong style="color:grey">K</strong>
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
  		<button class="add-card-btn btn">Add a card</button>
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
            <div class="col-md-11"><b>{{$module->name}}</b><br>
            </div>
            @if($module->creatoruserid == Auth::user()->id || Auth::user()->rights == "admin")
            <div class="justify-content-end dropdown">
              <i class="fa fa-caret-down"></i>
              <div class="dropdown-content">
                <a href="/edit/module/{{$module->id}}">Modul bearbeiten</a>
                <form action="/delete/module/{{$module->id}}" method="post">@csrf<input type="submit" value="Module löschen"/></form>
              </div>
            </div>
            @endif
          </div>
            <hr>
            @foreach($lessons as $lesson)
              @if($lesson->moduleid == $module->id)
              <div class="row">
              <div class="col-md-9">
                <a href="/{{$lesson->id}}/show">{{$lesson->lessonname}}</a>
                <!-- Hier Status ob bereits etwas hochgeladen -->
                @php
                  $settedFileZ = true;
                  $settedFileA = true;
                  $settedFileK = true;
                @endphp
              </div>
              <div class="col-md-3">
                <span class="">
                  @foreach($files as $file)
                    @if($file->type === "zusammenfassung" && $file->lessonid === $lesson->id)
                      <strong style="color:red">Z</strong>
                      @php
                      $settedFileZ = false;
                      @endphp
                      @break
                    @endif
                  @endforeach
                  @if($settedFileZ)
                    <strong style="color:grey">Z</strong>
                  @endif
                </span>
                <span class="">
                  @foreach($files as $file)
                    @if($file->type === "altklausur" && $file->lessonid === $lesson->id)
                      <strong style="color:red">A</strong>
                      @php
                      $settedFileA = false;
                      @endphp
                      @break
                    @endif
                  @endforeach
                  @if($settedFileA)
                    <strong style="color:grey">A</strong>
                  @endif
                </span>
                <span class="">
                  @foreach($files as $file)
                    @if($file->type === "karteikarte" && $file->lessonid === $lesson->id)
                      <strong style="color:red">K</strong>
                      @php
                      $settedFileK = false;
                      @endphp
                      @break
                    @endif
                  @endforeach
                  @if($settedFileK)
                    <strong style="color:grey">K</strong>
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
  		<button class="add-card-btn btn">Add a card</button>
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
            <div class="col-md-11"><b>{{$module->name}}</b><br>
            </div>
            @if($module->creatoruserid == Auth::user()->id || Auth::user()->rights == "admin")
            <div class="justify-content-end dropdown">
              <i class="fa fa-caret-down"></i>
              <div class="dropdown-content">
                <a href="/edit/module/{{$module->id}}">Modul bearbeiten</a>
                <form action="/delete/module/{{$module->id}}" method="post">@csrf<input type="submit" value="Module löschen"/></form>
              </div>
            </div>
            @endif
          </div>
            <hr>
            @foreach($lessons as $lesson)
              @if($lesson->moduleid == $module->id)
              <div class="row">
              <div class="col-md-9">
                <a href="/{{$lesson->id}}/show">{{$lesson->lessonname}}</a>
                <!-- Hier Status ob bereits etwas hochgeladen -->
                @php
                  $settedFileZ = true;
                  $settedFileA = true;
                  $settedFileK = true;
                @endphp
              </div>
              <div class="col-md-3">
                <span class="">
                  @foreach($files as $file)
                    @if($file->type === "zusammenfassung" && $file->lessonid === $lesson->id)
                      <strong style="color:red">Z</strong>
                      @php
                      $settedFileZ = false;
                      @endphp
                      @break
                    @endif
                  @endforeach
                  @if($settedFileZ)
                    <strong style="color:grey">Z</strong>
                  @endif
                </span>
                <span class="">
                  @foreach($files as $file)
                    @if($file->type === "altklausur" && $file->lessonid === $lesson->id)
                      <strong style="color:red">A</strong>
                      @php
                      $settedFileA = false;
                      @endphp
                      @break
                    @endif
                  @endforeach
                  @if($settedFileA)
                    <strong style="color:grey">A</strong>
                  @endif
                </span>
                <span class="">
                  @foreach($files as $file)
                    @if($file->type === "karteikarte" && $file->lessonid === $lesson->id)
                      <strong style="color:red">K</strong>
                      @php
                      $settedFileK = false;
                      @endphp
                      @break
                    @endif
                  @endforeach
                  @if($settedFileK)
                    <strong style="color:grey">K</strong>
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
  		<button class="add-card-btn btn">Add a card</button>
  	</div>
  </section>
@endif

</body>
