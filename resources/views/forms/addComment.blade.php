@include('standards/head')
@include('sidebar')
@include('topbar')
@include('inc/messages')
<body class="addComment-body">
  <div class="row pl-4">
    <div class="col-6">
      <h3>Vorschau</h3>
    </div>
    <div class="col-6 pl-0">
      <h3>Kommentare</h3>
    </div>
  </div>
  
  <div class="row pl-4">
    <div class="col-6">
      @if($fileToShow->extension != 'pdf' && $fileToShow->extension != 'txt')
        <div style="height: 500px; width: 500px;">
          <p>keine Vorschau</p>
        </div>
      @else
        <iframe src="http://fundus.localhost/.{{$fileToShow->path}}" frameborder="0" height="500px" width="500px"></iframe>
      @endif    
    </div>
    <div class="col-6">
      <div class="row mb-1 scrollable">
        @foreach($comments as $comment)
        <div class="col-12 mb-1">
            @foreach($users as $user)
              @if($comment->userid == $user->id)
                <div class="row">
                  <table>
                    <tr>
                      <td width="35px">
                        <div class="image">
                          @if(!empty($user->imageURL))
                              <img src="{{$user->imageURL}}" alt="Profilbild" class="img-circle" style="width: 25px; height: 25px;"/>
                          @else
                              <img src="https://i.pinimg.com/236x/8b/33/47/8b3347691677254b345de63fe82f8ef6--batman.jpg" style="width: 25px; height: 25px;" class="img-circle" alt="Profilbild"/>
                          @endif
                        </div>
                      </td>
                      
                      <td class="align-bottom">
                        <div class="">
                        {{$user->coursename}} | {{$user->username}}
                        </div> 
                      </td>
                    </tr>  

                    <tr>
                      <td colspan="2">{{$comment->content}} </td>
                    </tr>
                  </table>
                </div>
              @endif
            @endforeach
        </div>
        @endforeach
        </div>
          <div class="row">
          <form class="" action="/{{$lessonId}}/{{$fileToShow->id}}/add/comment/store" method="post">
            <input type="text" name="content" value="neuer Comment">
            <input type="submit" name="" value="abschicken">
            @csrf
          </form>
        </div>
      </div>
  </div>

  {{$rating}} <br>

  <a href="/{{$lessonId}}/{{$fileToShow->id}}/add/comment/up">hier upvoten</a>
  <a href="/{{$lessonId}}/{{$fileToShow->id}}/add/comment/down">hier downvoten</a>



  <div class="form-group row justify-content-center">
    <a href="/{{$lessonId}}/show"<button type="button" name="button">zurück</button>
  </div>
</body>

