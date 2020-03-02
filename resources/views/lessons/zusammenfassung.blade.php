@include('standards/head')

@include('sidebar')
@include('topbar')

<files-body>

<div class="row">
  <div class="col-md-7" style="margin-left: 250px; padding-left: 10px;">
    <ul class=" nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Zusammenfassungen</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Altklausuren</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Karteikarten</a>
      </li>
    </ul>
    <!-- Tab Zusammenfassungen -->
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <table>
          <thead>
            <th>Typ</th>
            <th>Dateiname</th>
            <th>Dozent</th>
            <th>Jahrgang</th>
            <th>Datum</th>
            <th>Hochgeladen von</th>
            <th>Bewertung</th>
            <th>Action</th>
          </thead>
          @foreach($files as $file)
          <tbody>
            <td>{{$file->extension}}</td>
            <td>{{$file->name}}</td>
            <td>{{$currentLesson->professorname}}</td>  <!-- Hier von Current zu "Zusammenfassung" ändern -->
            <td>
                @foreach($allUsers as $tempUser)
                  @if($file->creatoruserid == $tempUser->id)
                    @foreach($courses as $course)
                      @if($tempUser->courseid == $course->id)
                        {{$course->name}}
                      @endif
                    @endforeach
                  @endif
                @endforeach
            </td>
            <td>{{$file->updated_at}}</td>
            <td>
                @foreach($creators as $creator)
                  @if($file->creatoruserid == $creator->id)
                    {{$creator->username}}
                  @endif
                @endforeach
            </td>
            <td>{{$file->voting}}</td>
            <td>
              <!-- {{Request::path()}} -->
              <a href="/download/{{$file->id}}">Download</a>
              <a href="/{{$file->id}}/add/comment">kommentieren</a>
              @if($file->creatoruserid == $user->id)
              <a href="/zusammenfassung/{{$currentLesson->id}}/{{$file->id}}/delete">Löschen</a>
              @endif

            </td>
          </tbody>
          @endforeach
        </table>
      </div>

      <!-- Tab Altklausuren -->
      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <table>
          <thead>
            <th>Typ</th>
            <th>Dateiname</th>
            <th>Dozent</th>
            <th>Jahrgang</th>
            <th>Datum</th>
            <th>Hochgeladen von</th>
            <th>Bewertung</th>
            <th>Action</th>
          </thead>
          @foreach($files as $file)
          <tbody>
            <td>{{$file->extension}}</td>
            <td>{{$file->name}}</td>
            <td>{{$currentLesson->professorname}}</td>
            <td>
                @foreach($allUsers as $tempUser)
                  @if($file->creatoruserid == $tempUser->id)
                    @foreach($courses as $course)
                      @if($tempUser->courseid == $course->id)
                        {{$course->name}}
                      @endif
                    @endforeach
                  @endif
                @endforeach
            </td>
            <td>{{$file->updated_at}}</td>
            <td>
                @foreach($creators as $creator)
                  @if($file->creatoruserid == $creator->id)
                    {{$creator->username}}
                  @endif
                @endforeach
            </td>
            <td>{{$file->voting}}</td>
            <td>
              <!-- {{Request::path()}} -->
              <a href="/download/{{$file->id}}">Download</a>
              <a href="/{{$file->id}}/add/comment">kommentieren</a>
              @if($file->creatoruserid == $user->id)
              <a href="/altklausur/{{$currentLesson->id}}/{{$file->id}}/delete">Löschen</a>
              @endif

            </td>
          </tbody>
          @endforeach
        </table>
      </div>
      <!-- Tab Karteikarten -->
      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
        <table>
          <thead>
            <th>Typ</th>
            <th>Dateiname</th>
            <th>Dozent</th>
            <th>Jahrgang</th>
            <th>Datum</th>
            <th>Hochgeladen von</th>
            <th>Bewertung</th>
            <th>Action</th>
          </thead>
          @foreach($files as $file)
          <tbody>
            <td>{{$file->extension}}</td>
            <td>{{$file->name}}</td>
            <td>{{$currentLesson->professorname}}</td>
            <td>
                @foreach($allUsers as $tempUser)
                  @if($file->creatoruserid == $tempUser->id)
                    @foreach($courses as $course)
                      @if($tempUser->courseid == $course->id)
                        {{$course->name}}
                      @endif
                    @endforeach
                  @endif
                @endforeach
            </td>
            <td>{{$file->updated_at}}</td>
            <td>
                @foreach($creators as $creator)
                  @if($file->creatoruserid == $creator->id)
                    {{$creator->username}}
                  @endif
                @endforeach
            </td>
            <td>{{$file->voting}}</td>
            <td>
              <!-- {{Request::path()}} -->
              <a href="/download/{{$file->id}}">Download</a>
              <a href="/{{$file->id}}/add/comment">kommentieren</a>
              @if($file->creatoruserid == $user->id)
              <a href="/karteikarte/{{$currentLesson->id}}/{{$file->id}}/delete">Löschen</a>
              @endif

            </td>
          </tbody>
          @endforeach
        </table>

      </div>
    </div>
  </div>
  <div class="col-md-2">
    <a href="/{{$currentLesson->id}}/add/File" class="button-add-file"></a>
  </div>
</div>




</files-body>
