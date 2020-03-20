<h1>Hier kannst du dein Module {{$currentModule->name}} bearbeiten</h1>
<form class="" action="/edit/module/{{$currentModule->id}}/store" method="post">
  @csrf
  <input type="text" name="name" value="{{$currentModule->name}}"/>
  Semester:
  <input type="text" name="semester" value="{{$currentModule->semester}}"/>
  <input type="submit" name="" value="ändern"/>
</form>
<div class="form-group row justify-content-center">
  <a href="/"<button type="button" name="button">zurück</button>
</div>
