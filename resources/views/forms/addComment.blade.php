@include('inc.messages')
<h1>Comments hier</h1>
@if($fileToShow->extension != 'pdf' && $fileToShow->extension != 'txt')
  <p>keine Vorschau</p>
@else
<iframe src="http://fundus.localhost/.{{$fileToShow->path}}" frameborder="0" height="500px" width="500px"></iframe>
@endif

<h2>Votes für die File lol</h2>
{{$rating}} <br>

<a href="/{{$lessonId}}/{{$fileToShow->id}}/add/comment/up">hier upvoten</a>
<a href="/{{$lessonId}}/{{$fileToShow->id}}/add/comment/down">hier downvoten</a>

<h2>Comment-Section</h2>
@foreach($comments as $comment)
<p>
  <div class="">
    @foreach($users as $user)
      @if($comment->userid == $user->id)
        <div class="image">
          @if(!empty($user->imageURL))
              <img src="{{$user->imageURL}}" alt="Profilbild" class="img-circle" style="width:50px"/>
          @else
              <img src="https://i.pinimg.com/236x/8b/33/47/8b3347691677254b345de63fe82f8ef6--batman.jpg" style="width:50px" class="img-circle" alt="Profilbild"/>
          @endif
        </div>
        Name des Kommentierers=
        {{$user->username}} <br>
        Kurs des Kommentierers=
        {{$user->coursename}} <br>
        Inhalt des KOmmentars= {{$comment->content}}
      @endif
    @endforeach
    <br>
  </div>
</p>
@endforeach

<h2>KOmmentar hinzufügen</h2>
<form class="" action="/{{$lessonId}}/{{$fileToShow->id}}/add/comment/store" method="post">
  <input type="text" name="content" value="neuer Comment">
  <input type="submit" name="" value="abschicken">
  @csrf
</form>

<div class="form-group row justify-content-center">
  <a href="/{{$lessonId}}/show"<button type="button" name="button">zurück</button>
</div>
