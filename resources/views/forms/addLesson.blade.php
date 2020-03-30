@include('standards/head')
@include('sidebar')


<div class="addLesson-body">
@include('topbar')
  <div class="lesson-container">


    <h2>Füge nun eine Lehrveranstaltung für das {{$semester}}.Semester hinzu.</h2>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <form id="lessonForm" class="" action="/{{$semester}}/add/lesson/create/lesson" method="post">
      @csrf
    <input type="text" name="lessonname" value="" placeholder="Name der Vorlesung"><br>
    <select id="sex" name="sex">
     <option value="Herr">Herr</option>
     <option value="Frau">Frau</option>
     <option value="Divers">Divers</option>
    </select><br>
    <input type="text" name="professorname" value="" placeholder="Name des Dozenten"><br>
    <select id="module" name="module">
      @foreach($modules as $module)
      <option class="selects" value="{{$module->id}}">{{$module->name}}</option>
      @endforeach
    </select>
    <input type="text" id="moduleInput" name="newModule" style="display:none" value="" placeholder="Modulname"/>
    <br>
    <button id="addModule" type="button">neues Modul hinzufügen</button> <br>
    <input type="submit" value="abschicken"/>
    </form>
    <div class="form-group row justify-content-center">
      <a href="/home"<button type="button" name="button">zurück</button>
    </div>
  </div>
</div>
<script type="text/javascript">
$('#addModule').click(function(){
  $('#moduleInput').css('display','block');
  $('#lessonForm').attr('action', '/{{$semester}}/add/lesson/create/module')
  $('#module').remove();
  $('#addModule').remove();
});
</script>
