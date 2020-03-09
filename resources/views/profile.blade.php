@include('standards/head')

<body>
@include('sidebar')
  <div id="wrapper">
  @include('topbar')
    <div class="content">



      <div class="container">
         <form>
            <div class="row">
               <div class="offset-md-4 col-md-4">
                  <div class="form-group" style="height: 100%;">
                     <label for="files">Change your profile photo</label>
                     <span>
                        <div class="" style="width: 100%; height: 100%; font-size: 0px; margin-bottom: 1rem; background-color: rgb(29, 161, 242); background-image: url(&quot;https://abs.twimg.com/a/1498195419/img/t1/highline/empty_state/owner_empty_avatar.png&quot;); background-position: 50% center;">
                           <!-- react-text: 85 -->Try dropping some files.<!-- /react-text --><input type="file" accept="image/jpeg, image/png" multiple="" style="display: none;">
                        </div>
                        <button type="button" class="btn btn-secondary btn-sm btn-block">Upload new Photo</button><!-- react-text: 88 --><!-- /react-text -->
                     </span>
                  </div>
               </div>
               <div class="offset-md-4 col-md-4">
                  <div class="form-group" style="margin-top: 110px;">
                     <div><input type="text" name="first_name" placeholder="First Name" class="form-control" style="width: 100%;"></div>
                  </div>
                  <div class="form-group">
                     <div><input type="text" name="last_name" placeholder="Last Name" class="form-control" style="width: 100%;"></div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="offset-md-4 col-md-4"><button type="submit" class="btn btn-primary" style="width:100%;">Save Changes</button></div>
            </div>
         </form>
      </div>



      @include('inc.messages')
        @if($user->id == $currentUser->id)
          @if(!empty($user->imageURL))
              <img src="{{$user->imageURL}}" alt="Profilbild" class="img-thumbnail mx-auto d-block" style="max-width: 300px; max-height: 300px; margin: 15px;"/>
          @else
            <img src="https://i.pinimg.com/236x/8b/33/47/8b3347691677254b345de63fe82f8ef6--batman.jpg" width="100px" alt="Platzhalter für Profilbild"/>
          @endif
          <br>
          <form method="POST" action="/profile/{{$user->username}}/update" enctype="multipart/form-data">
            @csrf
            Neues Profilbil hochladen
            <input type="file" name="profileIMG" accept=".png, .jpg, .jpeg, .gif"></input></br>
            <input type="text" name="username" value="{{$user->username}}"></input></br>
            <input type="text" name="firstname" value="{{$user->firstname}}" placeholder="Kein Vorname vergeben"></input></br>
            <input type="text" name="lastname" value="{{$user->lastname}}" placeholder="Kein Nachname vergeben"></input></br>
            <input type="text" name="email" value="{{$user->email}}"></input></br>
            <p>{{$course}}</p></br>
            <input type="submit" value="Profil aktualisieren"></input>
          </form>
        @else
          @if(!empty($user->imageURL))
            <img src="{{$user->imageURL}}" alt="Profilbild" class="img-thumbnail mx-auto d-block"/>
          @else
            <img src="https://i.pinimg.com/236x/8b/33/47/8b3347691677254b345de63fe82f8ef6--batman.jpg" width="100px" alt="Platzhalter für Profilbild"/>
          @endif
          </br>
          Username = {{$user->username}}
          </br>
          Vorname =
          @if(!empty($user->firstname))
            {{$user->firstname}}
          @else
            Kein Vorname festgelegt
          @endif
          </br>
          Nachname =
          @if(!empty($user->lastname))
            {{$user->lastname}}
          @else
            Kein Nachname festgelegt
          @endif
          </br>
          Jahrgang = {{$course}}
          </br>
        @endif
      </div>
    </div>
  </body>
</html>
