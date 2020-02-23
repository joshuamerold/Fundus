<form class="" action="/add/lesson/create" method="post">
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
  <option value="{{$module->id}}">{{$module->name}}</option>
  @endforeach
</select><br>
<input type="submit" value="abschicken"/>
</form>
