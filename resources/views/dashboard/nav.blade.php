<div class="sidebar" data-color="white" data-active-color="danger">
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
        <a href="{{route('dashboard.index')}}">
          <i class="nc-icon nc-bank"></i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="{{ request()->is('guru') ? 'active' : '' }}">
        <a href="{{ route('guru.index')}}">
          <i class="nc-icon nc-bank"></i>
          <p>Guru</p>
        </a>
      </li>
      <li class="{{ request()->is('siswa') ? 'active' : '' }}">
        <a  href="{{ route('siswa.index')}}">
          <i class="nc-icon nc-diamond"></i>
          <p>Siswa</p>
        </a>
      </li>
    </ul>
  </div>
</div>