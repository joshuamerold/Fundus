
    @include('standards.header')
    <body>
      <h1 class="jumbotron">FUNDUS</h1>
      <a href="/test">ICH BIN EIN TEST</a>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

        </div>
    </body>
</html>

    @include('standards.footer')
