@include('standards/head')

<body class="home-body">

@include('sidebar')
@include('topbar')
@include('inc.messages')

    @if($user->id == $currentUser->id)   
        <form method="POST" action="/profile/{{$user->username}}/update" enctype="multipart/form-data" class="mt-2">
            <div class="form-group row justify-content-center">
                @if(!empty($user->imageURL))
                    <img src="{{$user->imageURL}}" alt="Profilbild"/>
                @else
                    <img src="https://i.pinimg.com/236x/8b/33/47/8b3347691677254b345de63fe82f8ef6--batman.jpg" width="100px" alt="Platzhalter für Profilbild"/>
                @endif
            </div>

            @csrf
            <div class="form-group row justify-content-center">   
                <label class="btn btn-outline-secondary">
                    Profilbild aktualisieren <input hidden type="file" name="profileIMG" accept=".png, .jpg, .jpeg, .gif" class="btn btn-primary"></input>
                </label>
            </div>


            <div class="form-group row justify-content-center">
                <input class="form-control" type="text" name="username" value="{{$user->username}}"></input>
            </div>

            <div class="form-group row justify-content-center">
                <input class="form-control" type="text" name="firstname" value="{{$user->firstname}}" placeholder="Kein Vorname vergeben"></input>
            </div>
            
            <div class="form-group row justify-content-center">
                <input class="form-control" type="text" name="lastname" value="{{$user->lastname}}" placeholder="Kein Nachname vergeben"></input>
            </div>
            
            <div class="form-group row justify-content-center">
                <input class="form-control" type="text" name="email" value="{{$user->email}}"></input>
            </div>

            <div class="form-group row justify-content-center">
                <p>Studiengang: {{$course}}</p>
            </div>

            <div class="form-group row justify-content-center">
                <button class="btn btn-red" type="submit">Profil aktualisieren</button>
            </div>

        </form>
    @else
        @if(!empty($user->imageURL))
            <img src="{{$user->imageURL}}" alt="Profilbild"/>
        @else
            <img src="https://i.pinimg.com/236x/8b/33/47/8b3347691677254b345de63fe82f8ef6--batman.jpg" width="100px" alt="Platzhalter für Profilbild"/>
        @endif
        </br>

        Username =
        {{$user->username}}
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

        Jahrgang =
        {{$course}}
        </br>
    @endif
</body>
</html>
