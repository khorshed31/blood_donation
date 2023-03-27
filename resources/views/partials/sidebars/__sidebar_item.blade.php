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

    <li class="side-nav-item">
        <a href="{{ route('admin.all.users.index') }}" class="side-nav-link">
            <i class='uil uil-users-alt'></i>
            <span> All Users </span>
        </a>
    </li>

    <li class="side-nav-item">
        <a href="{{ route('admin.chats.index') }}" class="side-nav-link">
            @if (is_read_count() > 0)
                <span class="badge bg-danger text-white float-end">{{ is_read_count() }}</span>
            @endif
            
            @if (is_read_count() > 0)
                <i class='uil uil-comment-check text-danger'></i>
            @else
                <i class='uil uil-comment'></i>
            @endif
            
            <span> Message </span>
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
