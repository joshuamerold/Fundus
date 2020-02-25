<a href="/{{$currentLesson->id}}/add/File">neue Datei hochladen</a>

<a href="/{{$currentLesson->id}}/show/altklausur">Altklausuren</a>
<a href="/{{$currentLesson->id}}/show/karteikarte">Karteikarten</a>

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
      <a href="/zusammenfassung/{{$currentLesson->id}}/{{$file->id}}/delete">Löschen</a>
      @endif

    </td>
  </tbody>
  @endforeach
</table>
