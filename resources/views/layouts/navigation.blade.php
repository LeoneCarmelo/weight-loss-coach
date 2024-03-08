<ul class="nav justify-content-between p-2 bg_first" id="navId" role="tablist">
    <li class="nav-item">
        <a href="{{route('dashboard')}}" class="nav-link text_second">Dashboard</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text_second" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="{{route('profile.edit')}}">
                {{ __('Profile') }}
            </a>
            <a class="dropdown-item" href="{{route('dashboard')}}">
                {{ __('Dashboard') }}
            </a>
            <div class="dropdown-divider"></div>
            <form class="dropdown-item" method="POST" action="{{ route('logout') }}">
                @csrf

                <a href="{{route('logout')}}" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                    {{ __('Log Out') }}
                </a>
            </form>
        </div>
    </li>
</ul>