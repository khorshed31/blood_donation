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

    <li class="side-nav-item">
        <a href="{{ route('admin.posts.create') }}" class="side-nav-link">
            <i class='mdi mdi-blood-bag'></i>
            <span> Request Blood </span>
        </a>
    </li>
@if (isAdmin())
    <li class="side-nav-item">
        <a href="{{ route('admin.posts.all') }}" class="side-nav-link">
            <i class="uil-rss"></i>
            <span> All Post </span>
        </a>
    </li>
@endif
    


</ul>
