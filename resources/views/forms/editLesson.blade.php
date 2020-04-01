@include('standards/head')
@include('sidebar')
@include('topbar')
@include('inc/messages')
<body class="editModule-body">
  <div class="editModule-card offset-md-2 col-md-8">
  <h2 class="mt-3">Lesson {{$currentLesson->name}} bearbeiten</h2>
    <div class="card-body">
      <form class="" action="/{{$currentLesson->id}}/edit/show/add" method="post">
        @csrf

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Name der Vorlesung</label>
            </div>
            <input class="form-control" type="text" name="name" value="{{$currentLesson->lessonname}}"/>
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Name des Professors</label>
            </div>
            <input class="form-control" type="text" name="professorname" value="{{$currentLesson->professorname}}"/>
          </div>
          <div class="input-group mb-3">
            <select name="module" class="custom-select" id="sex">
              @foreach($modules as $module)
                @if($module->id == $currentLesson->moduleid)
                  <option value="{{$module->id}}" selected>{{$module->name}}</option>
                @else
                  <option value="{{$module->id}}">{{$module->name}}</option>
                @endif
              @endforeach
            </select>
          </div>
          <div class="form-group row justify-content-center">
            <button class="btn btn-red" href="/" type="submit" name="button">Ändern</button>
          </div>
          <div class="form-group row justify-content-center">
            <a class="btn btn-outline-secondary" href="/" type="button" name="button">zurück</a>
          </div>
        </form>

      </div>
    </div>
  </div>
</body>
