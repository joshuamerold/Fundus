<!-- Zusammenfassung-Part -->
<a href="/{{$currentLesson->id}}/add/File" class="button-add-file">FIle hinzufügen</a>
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


  <!-- Zusammenfassung-Part -->
  @if($file->type == "zusammenfassung")
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
      <a href="/zusammenfassung/{{$currentLesson->id}}/{{$file->id}}/delete">Löschen</a>
      @endif

    </td>
  </tbody>
  @endif


  <!--Altklausuren-Part -->
  @if($file->type == "altklausur")
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
  @endif


  <!-- Karteikarten-Part -->
  @if($file->type == "karteikarte")
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
  @endif
  @endforeach
</table>
