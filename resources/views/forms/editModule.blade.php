@include('standards/head')
@include('sidebar')
@include('topbar')
@include('inc/messages')
<body class="editModule-body">
  <div class="editModule-card offset-md-2 col-md-8">
  <h2 class="mt-3">Modul {{$currentModule->name}} bearbeiten</h2>
    <div class="card-body">
      <form class="" action="/edit/module/{{$currentModule->id}}/store" method="post">
        @csrf

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Modulname</label>
            </div>
            <input class="form-control" type="text" name="name" value="{{$currentModule->name}}"/>
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Semester</label>
            </div>
            <input class="form-control" type="number" min="1" max="6" name="semester" value="{{$currentModule->semester}}"/>
          </div>
          <br>
          <div class="form-group row justify-content-center">
            <button class="btn btn-red" href="/" type="submit" name="button">Ändern</button>
          </div>
          <div class="form-group row justify-content-center">
            <button class="btn btn-outline-secondary" href="/" type="button" name="button">zurück</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</body>
