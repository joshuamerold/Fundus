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
  <a href="/{{$currentLesson->id}}/add/File" class="button-add-file"></a> <!--  -->

  <!--TABS ab hier -->
  <div class="row">
    <div class="col-md-12">
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
          <table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
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
        </div>

        <!-- Tab Altklausuren -->
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
          <table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
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
            @endforeach
          </table>
        </div>
        <!-- Tab Karteikarten -->
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
          <table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
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

        </div>
      </div>
    </div>
  </div>
</body>
