@include('standards/head')
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
                <input disabled class="form-control" type="text" name="username" value="{{$user->username}}"></input>
            </div>

            <div class="form-group row justify-content-center">
                <input class="form-control" type="text" name="firstname" value="{{$user->firstname}}" placeholder="Kein Vorname vergeben"></input>
            </div>

            <div class="form-group row justify-content-center">
                <input class="form-control" type="text" name="lastname" value="{{$user->lastname}}" placeholder="Kein Nachname vergeben"></input>
            </div>

            <div class="form-group row justify-content-center">
                <input disabled class="form-control" type="text" name="email" value="{{$user->email}}"></input>
            </div>

            <div class="form-group row justify-content-center">
                <p>Studiengang: {{$course}}</p>
            </div>

            <div class="form-group row justify-content-center">
                <button class="btn btn-red" type="submit">Profil aktualisieren</button>
            </div>

            <div class="form-group row justify-content-center">
                <a href="/" class="btn btn-outline-secondary">abbrechen</a>
            </div>
        </form>
    @else
        <div class="row justify-content-center mt-4">
            @if(!empty($user->imageURL))
                <img src="{{$user->imageURL}}" alt="Profilbild"/ class="img-circle profile-img">
            @else
                <img src="https://i.pinimg.com/236x/8b/33/47/8b3347691677254b345de63fe82f8ef6--batman.jpg" alt="Platzhalter für Profilbild"/ class="img-circle profile-img">
            @endif
        </div>

        <div class="row justify-content-center mt-4">
            <table>
                <tr>
                    <td class="long-td text-red">Username</th>
                    <td>{{$user->username}}</td>
                </tr>
                <tr>
                    <td class="long-td text-red">Vorname</th>
                    <td>
                        @if(!empty($user->firstname))
                            {{$user->firstname}}
                        @else
                            Kein Vorname festgelegt
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="long-td text-red">Nachname</th>
                    <td>
                    @if(!empty($user->lastname))
                        {{$user->lastname}}
                    @else
                        Kein Nachname festgelegt
                    @endif
                    </td>
                </tr>
                <tr>
                    <td class="long-td text-red">Jahrgang</th>
                    <td>{{$course}}</td>
                </tr>
            </table>
        </div>

        <div class="row justify-content-center">
            <table class="mt-4">
                <tr>
                    <td class="long-td">
                        <div>
                            <p>Zusammenfassungen</p>
                            <p class="counter-count">{{$countZ}}</p>
                        </div>
                    </td>

                    <td class="long-td">
                        <div>
                            <p>Altklausuren</p>
                            <p class="counter-count">{{$countA}}</p>
                        </div>
                    </td>

                    <td class="long-td">
                        <div>
                            <p>Karteikarten</p>
                            <p class="counter-count">{{$countK}}</p>
                        </div>
                    </td>
                </tr>
            </table>
        </div>


        <script>
            $('.counter-count').each(function () {
                $(this).prop('Counter',0).animate({
                    Counter: $(this).text()
                }, {
                    duration: 5000,
                    easing: 'swing',
                    step: function (now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            });
        </script>

    @endif
</body>
</html>
