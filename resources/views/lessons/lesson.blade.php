<h1>Zusammenfassung</h1>

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
    <td></td>
    <td>{{$file->updated_at}}</td>
    <td>
        @foreach($creators as $creator)
          @if($file->creatoruserid == $creator->id)
            {{$creator->username}}
          @endif
        @endforeach
    </td>
    <td></td>
    <td>
      <!-- {{Request::path()}} -->
      <a href="/download/{{$file->id}}">Download</a>
      <a href="">kommentieren</a>
      <a href="">Löschen</a>
      <a href="">bearbeiten</a>

    </td>
  </tbody>
  @endforeach
</table>
