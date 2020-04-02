@include('standards/head')
@include('sidebar')
@include('topbar')
<body class="addComment-body">
  <div class="row pl-4" >
    <div class="col">
      <a href="/{{$lessonId}}/show" name="button" class="custom-link"><span class="fa fa-caret-left"></span> Zurück</a>
    </div>
  </div>

  <div class="row pl-4">
    <div class="col-3">
      <h4>Vorschau</h4>
    </div>
    <div class="offset-2 col-1">
      <h4>
        <a href="/{{$lessonId}}/{{$fileToShow->id}}/add/comment/up" class="fa fa-angle-up custom-link"></a>
        {{$rating}}
        <a href="/{{$lessonId}}/{{$fileToShow->id}}/add/comment/down" class="fa fa-angle-down custom-link"></a>
      </h4>
    </div>
    <div class="col-6 pl-0">
      <h4>Kommentare</h4>
    </div>
  </div>

  <div class="row pl-4">
    <div class="col-6">
      <div class="row pl-3">
        @if($fileToShow->extension != 'pdf' && $fileToShow->extension != 'txt' && $fileToShow->extension != 'jpg')
          <div style="height: 545px; width: 600px;">
            <p>keine Vorschau</p>
          </div>
        @else
          <iframe src="http://fundus.localhost/.{{$fileToShow->path}}" class="custom-frame rounded-sm" height="545px" width="600px"></iframe>
        @endif
      </div>
    </div>
    <div class="col-6">
      <div class="row mb-1 scrollable rounded-sm" style="width: 310px; padding-top:unset;">
        <ul class="noStyle">
          @foreach($comments as $comment)
            <li class="mb-2" style="margin-top:20px">
              <div class="col-12 mb-2">
                  @foreach($users as $user)
                    @if($comment->userid == $user->id)
                      <div class="row">
                        <table style="margin-top:-10px;">
                          <tr>
                            <td width="10px">
                              <div class="image">
                                <a href="/profile/{{$user->username}}">
                                @if(!empty($user->imageURL))
                                    <img src="{{$user->imageURL}}" alt="Profilbild" class="img-circle" style="width: 35px; height: 35px;"/>
                                @else
                                    <img src="https://i.pinimg.com/236x/8b/33/47/8b3347691677254b345de63fe82f8ef6--batman.jpg" style="width: 35px; height: 35px;" class="img-circle" alt="Profilbild"/>
                                @endif
                                </a>
                              </div>
                            </td>

                            <td class="align-top"style="width:100%; margin-top:10px">
                              <div class="" style="padding-top: 3px; margin-left: 10px; line-height:15px;">
                                <a href="/profile/{{$user->username}}" class="custom-link-red">
                                  <small>{{$user->coursename}} | {{$user->username}}</small>
                                </a> <br>
                                <small class="smaller-lighter" style="">{{ $comment->created_at->format('d.m.Y , H:i') }}</small>
                              </div>
                            </td>

                            <td  class="align-bottom align-left">
                            </td>
                          </tr>

                          <tr>
                            <td colspan="4" style="word-break: break-word; padding:8px 0px;">
                            {{$comment->content}}
                            </td>
                          </div>
                          </tr>
                        </table>
                      </div>
                    @endif
                  @endforeach
              </div>
            <hr class="hr-custom">
            </li>
          @endforeach
        </ul>
      </div>
        <div class="row">
        <form action="/{{$lessonId}}/{{$fileToShow->id}}/add/comment/store" method="post">
          <div class="input-group-append">
            <input class="form-control" type="text" name="content" placeholder="Dein Kommentar" style="width: 250px; margin-right: 10px;">
            <span class="input-group-btn">
              <button class="btn btn-red btn-sm-custom" type="submit"><span class="fa fa-paper-plane" style="height: 8px;"></span></button>
            </span>
          </div>
          @csrf
        </form>
      </div>
    </div>
  </div>
</body>
