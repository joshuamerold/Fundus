@include('standards/head')
@include('sidebar')
@include('topbar')


<body class="addLesson-body">
  <div class="card offset-md-2 col-md-8">
    <h2 class="mt-3">Eine Lehrveranstaltung für das {{$semester}}.Semester hinzufügen</h2>
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
      <label class="input-group-text" for="inputGroupSelect01">Anrede</label>
    </div>
    <select name="sex" class="custom-select" id="sex">
    <option value="Herr">Herr</option>
    <option value="Frau">Frau</option>
    <option value="Divers">Divers</option>
    </select>
  </div>
  <p>

    <div class="input-group mb-3">
    <div class="input-group-prepend">
      <label class="input-group-text" for="inputGroupSelect01">Dozent</label>
    </div>
  <input type="text" name="professorname" value="" placeholder="Name des Dozenten">
    <select id="module" name="module" class="custom-select">
    @foreach($modules as $module)
  <option class="selects" value="{{$module->id}}">{{$module->name}}</option>
  @endforeach
</select>
</div>

<div class="input-group mb-3">
<div class="input-group-prepend">
  <label class="input-group-text" for="inputGroupSelect01">Modulname</label>
</div>
<input type="text" id="moduleInput" name="newModule" style="display:none" value="" placeholder="Modulname"/>
<br>


  <input  id="addModule" type="submit" name="" value="abschicken" class="btn btn-red">
</br>
          <div class="form-group row justify-content-center">
             <button id="addModule" type="button" class="btn btn-red">neues Modul hinzufügen </button>
          </div>
</br>
</div>
</form>
<div class="form-group row justify-content-center">
  <a href="/home"<button type="button" name="button">zurück</button>
</div>
<script type="text/javascript">
$('#addModule').click(function(){
  $('#moduleInput').css('display','block');
  $('#lessonForm').attr('action', '/{{$semester}}/add/lesson/create/module')
  $('#module').remove();
  $('#addModule').remove();
});

</script>
</body>
