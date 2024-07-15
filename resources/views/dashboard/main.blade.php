
<ul class="navbar-nav ms-auto">
    <li class="nav-item">
      <a href="{{ route('user.qrcode', Auth::user()->id) }}" class="nav-link">{{ Auth::user()->name }}</a>
    </li>
    <li class="nav-item">
      <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link text-body font-weight-bold px-0 ms-4">
        <span>Log Out</span>
      </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
        </form>
    </li>
</ul>