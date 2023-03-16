
@php
    $posts = Module\Blood\Models\Post::where('status',0)->get();
@endphp



<div class="navbar-custom topnav-navbar">
    <div class="container-fluid detached-nav">

        <!-- Topbar Logo -->
        <div class="logo-topbar">
            <!-- Logo light -->
            <a href="index.html" class="logo-light">
                            <span class="logo-lg">
                                <img src="assets/images/logo.png" alt="logo" height="22">
                            </span>
                <span class="logo-sm">
                                <img src="assets/images/logo-sm.png" alt="small logo" height="22">
                            </span>
            </a>

            <!-- Logo Dark -->
            <a href="index.html" class="logo-dark">
                            <span class="logo-lg">
                                <img src="assets/images/logo-dark.png" alt="dark logo" height="22">
                            </span>
                <span class="logo-sm">
                                <img src="assets/images/logo-dark-sm.png" alt="small logo" height="22">
                            </span>
            </a>
        </div>

        <!-- Sidebar Menu Toggle Button -->
        <button class="button-toggle-menu">
            <i class="mdi mdi-menu"></i>
        </button>

        <!-- Horizontal Menu Toggle Button -->
        <button class="navbar-toggle" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
            <div class="lines">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>
       

        <ul class="list-unstyled topbar-menu float-end mb-0">
            @if (isAdmin())
                <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="ri-notification-3-line noti-icon"></i>
                    @if($posts->count() > 0)
                        <span class="noti-icon-badge"></span>
                    @endif
                    
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg py-0">
                    <div class="p-2 border-top-0 border-start-0 border-end-0 border-dashed border">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0 font-16 fw-semibold"> Notification</h6>
                            </div>
                            <div class="col-auto">
                                <span class="badge badge-outline-warning">{{ $posts->count() }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="px-3" style="max-height: 300px;" data-simplebar>
                        <!-- item-->

                        @foreach ($posts as $post)
                            <a href="{{ route('admin.posts.all') }}?id={{ $post->id }}" class="dropdown-item p-0 notify-item card unread-noti shadow-none mb-2">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 text-truncate ms-2">
                                        <h5 class="noti-item-title fw-semibold font-14">{{ optional($post->created_user)->name }} <small class="fw-normal text-muted ms-1">{{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</small></h5>
                                        <small class="noti-item-subtitle text-muted">Blood Required: {{ $post->blood_group }}</small>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endforeach

                        
                    </div>

                </div>
            </li>
            @endif
            

            <li class="notification-list d-none d-sm-inline-block">
                <a class="nav-link" href="javascript:void(0)" id="light-dark-mode">
                    <i class="ri-moon-line noti-icon"></i>
                </a>
            </li>

            <li class="notification-list d-none d-md-inline-block">
                <a class="nav-link" href="#" data-toggle="fullscreen">
                    <i class="ri-fullscreen-line noti-icon"></i>
                </a>
            </li>

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                   aria-expanded="false">
                                <span class="account-user-avatar">
                                    @php
                                        $avatar = new \Laravolt\Avatar\Avatar();
                                        $randomColor = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
                                        $image = $avatar->create(optional(auth()->user())->name)->setBackground($randomColor)->toBase64();
                                    @endphp
                                    <img src="{{ $image }}" alt="user-image" class="rounded-circle">
                                </span>
                    <span>
                                    <span class="account-user-name">{{ optional(auth()->user())->name }}</span>
                                    <span class="account-position">{{ optional(auth()->user())->role }}</span>
                                </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                    <!-- item-->
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="mdi mdi-account-circle me-1"></i>
                        <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="{{ route('logout') }}" class="dropdown-item notify-item"
                       onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                        <i class="mdi mdi-logout me-1"></i>
                        <span>Logout</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</div>
