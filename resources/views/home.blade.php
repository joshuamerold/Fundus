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

                <div class="module-card">
                  <div class="row">
                    <div class="col-md-11"><b>{{$module->name}}</b><br>
                    </div>
                    @if($module->creatoruserid == Auth::user()->id)
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
                        <a href="/{{$lesson->id}}/show">{{$lesson->lessonname}}</a>
                        <!-- Hier Status ob bereits etwas hochgeladen -->
                        @php
                            $settedFileZ = true;
                            $settedFileA = true;
                            $settedFileK = true;
                        @endphp
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
                        <br>
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
