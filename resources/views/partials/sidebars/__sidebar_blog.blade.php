<ul class="side-nav">

    <li class="side-nav-title side-nav-item">Navigation</li>

    <li class="side-nav-item">
        <a href="{{ url('home') }}" class="side-nav-link">
            <i class="uil-home-alt"></i>
            <span> Dashboard </span>
        </a>
    </li>

    <li class="side-nav-title side-nav-item">Blood Donation</li>

    <li class="side-nav-item">
        <a href="{{ route('admin.posts.index') }}" class="side-nav-link">
            <i class="uil-rss"></i>
            <span> My Post </span>
        </a>
    </li>

    {{-- <li class="side-nav-item">
        <a href="{{ route('admin.images.index') }}" class="side-nav-link">
            <i class="ri-image-2-fill"></i>
            <span> Images </span>
        </a>
    </li>

    <li class="side-nav-item">
        <a href="{{ route('admin.comments') }}" class="side-nav-link">
            <i class="ri-message-2-fill"></i>
            <span> Comments </span>
        </a>
    </li> --}}


</ul>
