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
        <a href="/profile/{{ Auth::user()->name }}" class="profile-link">{{ Auth::user()->username }}</a>
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
              <a href="#" class="fa fa-plus"></a> <!-- hier neue Kalendereinträge einfügen -->
            </div>
          </div>
          <hr class="hr-side">
          @foreach($dates as $date)
          @if($date->courseid === Auth::user()->courseid)
          <table>
            <tr>
              <td>
                {{$date->name}}
              </td>
              <td class="date">
                {{$date->date}}
                @if($date->creatoruserid === Auth::user()->id)
                <form class="" action="/{{$date->id}}/delete" method="post">
                  @csrf
                  <input type="submit" name="" value="del">
                  <input type="text" name="currentURL" value="{{url()->current()}} " style="display:none;">
                </form>
                @endif
              </td>
            </tr>
          </table>
          @endif
          @endforeach
          <a href="/add/date">Hier Datum hinzufügen</a>
        </div>
      </li>
    </ul>
  </nav>
</div>
</aside>
