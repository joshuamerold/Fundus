@include('standards/head')
@include('sidebar')
@include('topbar')


<body class="addLesson-body">
  <div class="card offset-md-2 col-md-8">
    <h2 class="mt-3">Lehrveranstaltung für das {{$semester}}.Semester hinzufügen</h2>
    <p></p>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <form id="lessonForm" class="" action="/{{$semester}}/add/lesson/create/lesson" method="post">
      @csrf

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Vorlesung</label>
        </div>
        <input type="text" name="lessonname" value="" placeholder="Name der Vorlesung" class="form-control">
      </div>

      <p>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Dozent</label>
          </div>
          <select name="sex" class="custom-select" id="sex">
            <option value="Herr">Herr</option>
            <option value="Frau">Frau</option>
            <option value="Divers">Divers</option>
          </select>
          <input type="text" name="professorname" value="" placeholder="Name des Dozenten" class="form-control">
        </div>
        <p>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Modulname</label>
            </div>
            <select id="module" name="module" class="custom-select">
              @foreach($modules as $module)
              <option class="selects" value="{{$module->id}}">{{$module->name}}</option>
              @endforeach
            </select>
            <input type="text" id="moduleInput" name="newModule" style="display:none" value="" placeholder="Modulname"/>


              <button id="addModule" type="button" class="form-control">oder: neues Modul hinzufügen</button>
              <script type="text/javascript">
              $('#addModule').click(function(){
                $('#moduleInput').css('display','block');
                $('#lessonForm').attr('action', '/{{$semester}}/add/lesson/create/module')
                $('#module').remove();
                $('#addModule').remove();
              });
              </script>
            </div>

        </br>

        <br>
        <div class="form-group row justify-content-center">
          <input  type="submit" name="" value="abschicken" class="btn btn-red">
        </div>
      </form>
        
        <div class="form-group row justify-content-center">
          <a href="/home"<button type="button" name="button">zurück</button>
          </div>
        </div>
      </div>
    </body>
