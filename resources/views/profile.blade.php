<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    @if($user->id == $currentUser->id)
        <form method="POST" action="/profile/{{$user->username}}/update">
            @csrf
            Neues Profilbil hochladen
            <input type="file" enctype="mulitpart/form-data"></input></br>
            <input type="text" value="{{$user->username}}"></input></br>
            <input type="text" value="{{$user->firstname}}" placeholder="Kein Vorname vergeben"></input></br>
            <input type="text" value="{{$user->lastname}}" placeholder="Kein Nachname vergeben"></input></br>
            <input type="text" value="{{$user->email}}"></input></br>
            <p>{{$course}}</p></br>

            <input type="submit" value="Profil aktualisieren"></input>

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