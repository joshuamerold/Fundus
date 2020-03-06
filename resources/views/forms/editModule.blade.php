<h1>Hier kannst du dein Module {{$currentModule->name}} bearbeiten</h1>
<form class="" action="/edit/module/{{$currentModule->id}}/store" method="post">
  @csrf
  <input type="text" name="name" value="{{$currentModule->name}}"/>
  <input type="submit" name="" value="ändern"/>
</form>
