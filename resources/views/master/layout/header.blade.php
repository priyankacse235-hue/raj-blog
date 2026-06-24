<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="{{ url('/') }}" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ url('admin/profile/wallet') }}" class="nav-link">Wallet</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ url('admin/profile/wallet') }}" class="nav-link font-weight-bolder"> 
                {{ Auth::user()->wallet_amount }}
            </a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit"><i class="fas fa-search"></i></button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search"><i class="fas fa-times"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-cog"></i>
                <span class="badge badge-warning navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">Settings</span>
                <div class="dropdown-divider"></div>
                <a href="{{ url('logout') }}" class="dropdown-item">
                    <i class="fas fa-sign-in mr-2"></i> Logout
                </a>
                <div class="dropdown-divider"></div>  
            </div>
        </li>
    </ul>
</nav>

