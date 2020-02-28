<!-- Sidebar Haupt-Container -->
<aside class="main-sidebar">
<!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar User Panel -->
    <div class="user-panel mt-3 pb-3 mb--3 d-flex">
      <div class="image">
        <img src="https://i.pinimg.com/236x/8b/33/47/8b3347691677254b345de63fe82f8ef6--batman.jpg" class="img-circle" alt="Profilbild">
      </div>

      <div class="info">
        <a href="/profile/{{$user->username}}" class="profile-link">{{$user->username}}</a>
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
          <span>{{$course->name}}</span>
        </div>
      </div>
  <hr>
  <!-- Sidebar Menü -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column">
      <li class="nav-item">
        <!-- Sidebar Karten -->
        <div class="sidebar-card">
          <b>Aktuelle Fristen</b><br>
          <hr class="hr-side">
          <table>
            <tr>
              <td>
                WebDesign
              </td>
              <td class="date">
                06.03.2020
              </td>
            </tr>
          </table>
        </div>
      </li>
    </ul>
  </nav>
</div>
</aside>
