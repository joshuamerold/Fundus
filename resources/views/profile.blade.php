@include('standards/head')

<body class="home-body">

@include('sidebar')
@include('topbar')
@include('inc.messages')

    @if($user->id == $currentUser->id)   
        <form method="POST" action="/profile/{{$user->username}}/update" enctype="multipart/form-data" class="mt-4">
            <div class="form-group row justify-content-center">
                @if(!empty($user->imageURL))
                    <img src="{{$user->imageURL}}" alt="Profilbild"/ class="img-circle profile-img">
                @else
                    <img src="https://i.pinimg.com/236x/8b/33/47/8b3347691677254b345de63fe82f8ef6--batman.jpg" alt="Platzhalter für Profilbild"/ class="img-circle profile-img">
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
        <div class="row justify-content-center mt-3">
            @if(!empty($user->imageURL))
                <img src="{{$user->imageURL}}" alt="Profilbild"/ class="img-circle profile-img">
            @else
                <img src="https://i.pinimg.com/236x/8b/33/47/8b3347691677254b345de63fe82f8ef6--batman.jpg" alt="Platzhalter für Profilbild"/ class="img-circle profile-img">
            @endif
        </div>
        
        <div class="row justify-content-center mt-3">
            <table>
                <tr>
                    <th class="long-th">Username</th>
                    <td>{{$user->username}}</td>
                </tr>
                <tr>
                    <th class="long-th">Vorname</th>
                    <td>       
                        @if(!empty($user->firstname))
                            {{$user->firstname}}
                        @else
                            Kein Vorname festgelegt
                        @endif
                    </td>
                </tr>
                <tr>
                    <th class="long-th">Nachname</th>
                    <td>
                    @if(!empty($user->lastname))
                        {{$user->lastname}}
                    @else
                        Kein Nachname festgelegt
                    @endif
                    </td>
                </tr>
                <tr>
                    <th class="long-th">Jahrgang</th>
                    <td>{{$course}}</td>
                </tr>
            </table>
        </div>
    @endif
</body>
</html>
