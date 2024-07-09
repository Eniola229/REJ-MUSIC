 <div class="sidebar">
        <div class="logo">
            <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Admin Avatar">
        </div>
        <a href="{{ url('dashboard') }}" class=""><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="{{ url('addcate') }}"><i class="fas fa-list"></i> Categories</a>
        <a href="{{ url('addsong') }}"><i class="fas fa-music"></i> Songs</a>
        <a href="{{ url('users') }}"><i class="fas fa-users"></i> Users</a>
        <a href="#settings"><i class="fas fa-cogs"></i> Settings</a>
        <a href="{{ url('reports') }}"><i class="fas fa-chart-line"></i> Reports</a>
        <a href="#logout"><i class="fas fa-sign-out-alt"></i> <form style="display: inline-block;" action="{{ route('logout') }}" method="POST">
                                                @csrf
                                                 <button style="color: white;" class="btn " :href="route('logout')"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                                {{ __('Log Out') }} </button> </form>  </a>
        </div>