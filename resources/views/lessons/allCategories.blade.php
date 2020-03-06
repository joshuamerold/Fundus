@include('standards/head')
@include('sidebar')
@include('topbar')
<script>
$(document).ready(function () {
$('#dtBasicExample').DataTable();
$('.dataTables_length').addClass('bs-select');
});
</script>

<body class="allCategories-body">
  <a href="/{{$currentLesson->id}}/add/File" class="button-add-file"></a>
  <table id="table-zusammenfassung" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">

    <thead>
      <th class="th-sm">Typ</th>
      <th class="th-sm">Dateiname</th>
      <th class="th-sm">Dozent</th>
      <th class="th-sm">Jahrgang</th>
      <th class="th-sm">Datum</th>
      <th class="th-sm">Hochgeladen von</th>
      <th class="th-sm">Bewertung</th>
      <th class="th-sm">Action</th>
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
        <table class="inner-table">
          <tr>
            <td><a href="/download/{{$file->id}}" class="fa fa-arrow-circle-o-down"> </a></td>
            <td><a href="/{{$file->id}}/add/comment" class="fa fa-comment-o" aria-hidden="true"> </a></td>
            <td>
            @if($file->creatoruserid == $user->id)
            <a href="/zusammenfassung/{{$currentLesson->id}}/{{$file->id}}/delete" class="fa fa-trash"> </a>
            @endif
            </td>
          </tr>
        </table>
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
        <table class="inner-table">
          <tr>
            <td><a href="/download/{{$file->id}}" class="fa fa-arrow-circle-o-down"> </a></td>
            <td><a href="/{{$file->id}}/add/comment" class="fa fa-comment-o" aria-hidden="true"> </a></td>
            <td>
            @if($file->creatoruserid == $user->id)
            <a href="/zusammenfassung/{{$currentLesson->id}}/{{$file->id}}/delete" class="fa fa-trash"> </a>
            @endif
            </td>
          </tr>
        </table>
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
        <table class="inner-table">
          <tr>
            <td><a href="/download/{{$file->id}}" class="fa fa-arrow-circle-o-down"> </a></td>
            <td><a href="/{{$file->id}}/add/comment" class="fa fa-comment-o" aria-hidden="true"> </a></td>
            <td>
            @if($file->creatoruserid == $user->id)
            <a href="/zusammenfassung/{{$currentLesson->id}}/{{$file->id}}/delete" class="fa fa-trash"> </a>
            @endif
            </td>
          </tr>
        </table>
      </td>
    </tbody>
    @endif
    @endforeach
  </table>


<!--TABS ab hier -->






</body>
