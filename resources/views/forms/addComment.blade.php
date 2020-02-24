<h1>Comments hier</h1>
 <iframe src="http://fundus.localhost/.{{$fileToShow->path}}" frameborder="0" height="500px" width="500px"></iframe>

<h2>Votes für die File lol</h2>
{{$rating}} <br>

<a href="/{{$fileToShow->id}}/add/comment/up">hier upvoten</a>
<a href="/{{$fileToShow->id}}/add/comment/down">hier downvoten</a>

<h2>Comment-Section</h2>
@foreach($comments as $comment)
<p>
  <div class="">
    Name des Kommentierers=
    @foreach($users as $user)
      @if($comment->userid == $user->id)
        {{$user->username}} <br>
        Kurs des Kommentierers=
        @foreach($courses as $course)
          @if($user->courseid == $course->id)
          {{$course->name}}<br>
          @endif
        @endforeach
        Inhalt des KOmmentars= {{$comment->content}}
      @endif
    @endforeach
    <br>
  </div>
</p>
@endforeach

<h2>KOmmentar hinzufügen</h2>
<form class="" action="/{{$fileToShow->id}}/add/comment/store" method="post">
  <input type="text" name="content" value="neuer Comment">
  <input type="submit" name="" value="abschicken">
  @csrf
</form>
