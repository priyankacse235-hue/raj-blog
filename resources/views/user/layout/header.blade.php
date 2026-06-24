{{-- <div class="top-header">
    <div class="container-fluid">
        <div class="d-flex">
            <div class="soccial-icons">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item"><a href="#" class="fa fa-facebook"></a></li>
                    <li class="list-inline-item"><a href="#" class="fa fa-instagram"></a></li>
                    <li class="list-inline-item"><a href="#" class="fa fa-twitter"></a></li>
                    <li class="list-inline-item"><a href="#" class="fa fa-linkedin"></a></li>
                    <li class="list-inline-item"><a href="#" class="fa fa-youtube"></a></li>
                </ul>
            </div>
            <div class="ml-auto header-no"><i class="fa fa-envelope"></i> rkcreation7987@gmail.com </div>
        </div>
    </div>
</div> --}}

<header class="headermain shadow-sm sticky-top">
    <div class="container-fluid">
        <div class="d-flex">
            <div class="flex-grow-1">
                <nav class="navbar navbar-expand-xl">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{-- <img src="{{ url('images/_mini_logo-black.png') }}" /> --}}
                        
                        {{-- <img class="custom_logo_image" src="{{ url('storage/'.($site_data !== null ? $site_data->logo : '' )) }}" /> --}}
                        {{-- <img class="custom_logo_image" src="{{ asset('images/logo.jpeg') }}" /> --}}
                        <img
    class="custom_logo_image"
 src="{{ asset('images/logo/png/logo.jpeg') }}"
 
    alt="Logo"
     class="img-fluid"
    style="max-height:70px;">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button> 
                    <div class="collapse navbar-collapse pl-5" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('blogs*') ? 'active' : '' }}" href="{{ url('blogs') }}">Blogs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('about') ? 'nav-active' : '' }}" href="{{ url('about') }}">About us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('contact') ? 'nav-active' : '' }}" href="{{ url('contact') }}">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('templates*') ? 'nav-active' : '' }}" href="{{ url('templates') }}"> Templates</a>
                            </li>
                        </ul>
{{-- <form action="{{ url('search') }}" method="GET" class="mx-3 position-relative">
    <div class="input-group">
        <input
            type="text"
            id="search-box"
            name="q"
            class="form-control"
            placeholder="Search blogs..."
            autocomplete="off"
        >

        <div class="input-group-append">
            <button type="submit" class="input-group-text bg-white border-left-0">
                <i class="fa fa-search"></i>
            </button>
        </div>
    </div>

    <div id="search-results"></div>
</form> --}}

                        @if(Auth::check())
                            <div class="dropdown text-right login-btn">
                                <a class="btn btn-light dropdown-toggle rounded-circle" href="#" role="button" id="profileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   
                                    @if (Auth::user()->profile_photo_path)
                                        <img alt="user image" class="rounded-circle" style="height: 25px; width: 25px; object-fit: cover;" src="{{ url('storage',Auth::user()->profile_photo_path) }}" />
                                    @else  
                                        <img class="rounded-circle" style="height: 25px; width: 25px; object-fit: cover;" src="{{url('images/user.png')}}" />&nbsp;
                                    @endif
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown">
                                    <a class="dropdown-item" target="_blank" href="{{ url('admin/profile/my-profile') }}">
                                        <i class="fa fa-user mr-2"></i> Profile
                                    </a>
                                    <a class="dropdown-item" target="_blank" href="{{ url('admin/dashboard') }}">
                                        <i class="fa fa-tachometer mr-2"></i> Dashboard
                                    </a>
                                    <a class="dropdown-item text-danger" href="{{ url('logout') }}">
                                        <i class="fa fa-sign-out mr-2"></i> Logout
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="login-btn text-center px-4">
                                <a href="{{ url('registration') }}" class="btn btn-primary">
                                    Became a Blogger
                                </a>
                                <a href="{{ url('login') }}" class="btn btn-secondary rounded-pill">
                                    Login
                                </a>
                            </div>
                        @endif
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<script>
document.getElementById('search-box').addEventListener('keyup', function () {

    let q = this.value;

    if (q.length < 2) {
        document.getElementById('search-results').innerHTML = '';
        return;
    }

    fetch('/search-suggestions?q=' + encodeURIComponent(q))
        .then(response => response.json())
        .then(data => {

            let html = '<ul class="list-group">';

            data.forEach(item => {
                html += `<li class="list-group-item">
                            <a href="/search?q=${encodeURIComponent(item.title)}">
                                ${item.title}
                            </a>
                         </li>`;
            });

            html += '</ul>';

            document.getElementById('search-results').innerHTML = html;
        });
});
</script>
