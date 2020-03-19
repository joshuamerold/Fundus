<!-- Sidebar Haupt-Container -->
<aside class="main-sidebar">
<!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar User Panel -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        @if(!empty(Auth::user()->imageURL))
            <img src="{{Auth::user()->imageURL}}" alt="Profilbild" class="img-circle"/>
        @else
            <img src="https://i.pinimg.com/236x/8b/33/47/8b3347691677254b345de63fe82f8ef6--batman.jpg" width="100px" class="img-circle" alt="Profilbild"/>
        @endif
      </div>

      <div class="info">
        <a href="/profile/{{ Auth::user()->username }}" class="profile-link">{{ Auth::user()->username }}</a>
        <!-- LogoutDropdown -->
        <div class="logout">
          @guest
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
            @endif
            @else
            <div class="dropdown">
              <a id="LogoutDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
              </a>
              <div class="dropdown-menu" aria-labelledby="LogoutDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </div>
            </div>
          @endguest
          </div>
          <span>{{ Auth::user()->coursename }}</span>
        </div>
      </div>
  <hr>
  <!-- Sidebar Menü -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column">
      <li class="nav-item">
        <!-- Sidebar Karten -->

        <div class="sidebar-card">
          <div class="row">
            <div class="col-md-11">
              <b>Aktuelle Fristen</b><br>
            </div>
            <div class="justify-content-end add-date">
              <a href="/add/date" class="fa fa-plus"></a>
            </div>
          </div>
          <hr class="hr-side">
          @foreach($dates as $date)
          @if($date->yeargang === Auth::user()->coursename)
          <table>
            <tr>
              <td class="date-name">
                {{$date->name}}
              </td>
              <td class="date-date">
                {{$date->date}}
                @if($date->creatoruserid === Auth::user()->id || Auth::user()->rights == "admin")
              </td>
              <td>
                <form class="" action="/{{$date->id}}/delete" method="post">
                  @csrf
                  <div class="dropdown">
                    <a id="LogoutDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="LogoutDropdown">
                      <form class="" action="/{{$date->id}}/delete" method="post">
                        <input type="submit" name="" value="del">
                        <input type="text" name="currentURL" value="{{url()->current()}} " style="display:none;">
                        @csrf
                      </form>
                    </div>
                  </div>
                @endif
              </td>
            </tr>
          </table>
          @endif
          @endforeach
        </div>
      </li>
    </ul>
  </nav>
</div>
</aside>
