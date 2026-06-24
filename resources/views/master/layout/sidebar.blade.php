<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ url('/') }}" target="_blank" class="brand-link">
        <img src="{{asset('images/_mini_logo-black.png')}}" alt="" class="img-fluid"><br> 
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <a href="{{ url('admin/profile/my-profile') }}" >
            <div class="image">
                @if (Auth::user()->profile_photo_path)
                    <img class="img-circle elevation-2" alt="user image" src="{{ url('storage',Auth::user()->profile_photo_path) }}" />
                @else  
                    <img src="{{url('images/user.png')}}" />&nbsp;
                @endif
            </div>
            <div class="info">
                <a href="{{ url('admin/profile/my-profile') }}" class="d-block text-capitalize">
                    {{ Auth::user()->name }}
                </a>
            </div>
            </a>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ url('admin/dashboard') }}" class="nav-link {{ Request::path() == 'admin/dashboard' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @if (Auth::user()->user_type)
                    <li class="nav-item {{ (Request::is('admin/category') || Request::is('admin/genral-setting') || Request::is('admin/social-media'))   ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ (Request::is('admin/category') || Request::is('admin/genral-setting') || Request::is('admin/social-media'))   ? 'active' : '' }}">
                            <i class="nav-icon fas fa-th"></i>
                            <p>Masters<i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('admin/category') }}" class="nav-link {{ Request::is('admin/category') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Categories</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('admin/genral-setting') }}" class="nav-link {{ Request::is('admin/genral-setting') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Genral Settings</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('admin/social-media') }}" class="nav-link {{ Request::is('admin/social-media') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Socail Media Links</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                <li class="nav-item {{ (Request::is('admin/blog/create') || Request::is('admin/blog'))   ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-globe"></i>
                        <p>Blog<i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('admin/blog/create') }}" class="nav-link {{ Request::is('admin/blog/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create New Blog</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/blog') }}" class="nav-link {{ Request::is('admin/blog') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Blogs</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @if (Auth::user()->user_type)
                    <li class="nav-item">
                        <a href="{{ url('admin/templates') }}" class="nav-link {{ Request::is('admin/templates') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-birthday-cake text-info"></i>
                            <p>Templates</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/users') }}" class="nav-link {{ Request::is('admin/users') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users text-info"></i>
                            <p>Users</p>
                        </a>
                    </li>
                @endif
                {{-- <li class="nav-item">
                    <a href="{{ url('admin/wallet-setting') }}" class="nav-link {{ Request::is('admin/wallet-setting') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cog text-info"></i>
                        <p>Wallet Setting</p>
                    </a>
                </li> 
                <li class="nav-item">
                    <a href="{{ url('admin/profile/wallet') }}" class="nav-link {{ \Request::path() == 'admin/profile/wallet' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user text-info"></i>
                        <p>Wallet</p>
                    </a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a href="{{ url('admin/profile/invite-friend') }}" class="nav-link {{ \Request::path() == 'admin/profile/invite-friend' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user text-info"></i>
                        <p>Invite Your Friend</p>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a href="{{ url('admin/profile/my-profile') }}" class="nav-link {{ \Request::path() == 'admin/profile/my-profile' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user text-info"></i>
                        <p>My Profile</p>
                    </a>
                </li> 
                @if (Auth::user()->user_type)
                    <li class="nav-item">
                        <a href="{{ url('admin/happy-customers') }}" class="nav-link {{ \Request::path() == 'admin/happy-customers' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users text-info"></i>
                            <p>Happy Customers</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/contacts') }}" class="nav-link {{ \Request::path() == 'admin/contacts' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users text-info"></i>
                            <p>Contacts</p>
                        </a>
                    </li> 
                    <li class="nav-item">
                        <a href="{{ url('admin/spam-report') }}" class="nav-link {{ \Request::path() == 'admin/spam-report' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-exclamation-triangle"></i>
                            <p>Spam Reports</p>
                        </a>
                    </li> 
                @endif
            </ul>
        </nav>
    </div>
</aside> 
