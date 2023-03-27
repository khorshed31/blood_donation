@extends('layouts.master')

@section('title', 'Chat')

@section('page-header')
    <i class="fa fa-plus-circle"></i> Chat
@stop

@section('css')

@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                        {{-- <li class="breadcrumb-item"><a href="{{ route('admin.blogs.index') }}">Blogs</a></li> --}}
                        <li class="breadcrumb-item active">Chat</li>
                    </ol>
                </div>
                <h4 class="page-title">Chat <a href="{{ request()->url() }}" class="btn btn-sm btn-light"  data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Reload">
                    <i class="uil-refresh"></i>
                </a></h4> 
            </div>
        </div>
    </div>


    <div class="row">

        <!-- start chat users-->
        <div class="col-xxl-3 col-xl-6 order-xl-1">
            <div class="card">
                <div class="card-body p-0">
                    <div class="tab-content">
                        <div class="tab-pane show active card-body pb-0" id="newpost">

                            <!-- start search box -->
                            <div class="app-search">
                                <form>
                                    <div class="input-group">
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Search People ..." />
                                        <button class="btn btn-success" type="submit" style="padding: 18px;"><span class="mdi mdi-magnify search-icon"></span></button>
                                    </div>
                                    {{-- <div class="mb-2 position-relative">
                                        <input type="text" class="form-control"
                                            placeholder="People, groups & messages..." />
                                        <span class="mdi mdi-magnify search-icon"></span>
                                    </div> --}}
                                </form>
                            </div>
                            <!-- end search box -->
                        </div>

                        <!-- users -->
                        <div class="row">
                            <div class="col">
                                <div class="card-body py-0 mb-3" data-simplebar style="max-height: 546px">
                                    @foreach ($chat_lists as $item)
                                    @php
                                        $avatar = new \Laravolt\Avatar\Avatar();
                                        $randomColor = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
                                        $image = $avatar->create(optional($item->sender)->name)->setBackground($randomColor)->toBase64();
                                    @endphp
                                    @if ($item->sender_id != auth()->user()->id)
                                        <a href="{{ route('admin.chats.show',$item->sender_id) }}" class="text-body">
                                        <div class="d-flex align-items-start {{ $item->receiver_id == auth()->user()->id ? 'bg-light' : '' }} mt-1 p-2">
                                            <img src="{{ isset(optional($item->sender)->image) ? asset(optional($item->sender)->image) : $image }}" class="me-2 rounded-circle" height="48" alt="Brandon Smith" />
                                            <div class="w-100 overflow-hidden">
                                                <h5 class="mt-0 mb-0 font-14">
                                                    <span class="float-end text-muted font-12">{{ Carbon\Carbon::parse($item->created_at)->format('h:m a') }}</span>
                                                    {{ $item->sender->name }}
                                                </h5>
                                                <p class="mt-1 mb-0 text-muted font-14">
                                                    {{-- <span class="w-25 float-end text-end"><span class="badge badge-danger-lighten">{{ $unread_chats }}</span></span> --}}
                                                    <span class="w-75">{{ $item->chat }}</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                    @endif
                                    
                                    @endforeach                                                   

                                </div> <!-- end slimscroll-->
                            </div> <!-- End col -->
                        </div> <!-- end users -->
                    </div> <!-- end tab content-->
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
        <!-- end chat users-->

        <!-- chat area -->
        <div class="col-xxl-6 col-xl-12 order-xl-2">
            <div class="card">
                <div class="card-body px-0 pb-0">
                    <ul class="conversation-list px-3" data-simplebar style="max-height: 554px">
                        @foreach ($chats as $chat)
                        @php
                            $avatar = new \Laravolt\Avatar\Avatar();
                            $randomColor = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
                            $image_sender = $avatar->create(optional($chat->sender)->name)->setBackground($randomColor)->toBase64();
                            $image_receiver = $avatar->create($user->name)->setBackground($randomColor)->toBase64();

                        @endphp

                        {{-- @if ($chat->room_id == $a.$b) --}}
                             <li class="clearfix {{ $chat->sender_id == auth()->user()->id ? 'odd' : '' }}">
                            <div class="chat-avatar">
                                @if ($chat->sender_id == auth()->user()->id)
                                    <img src="{{ isset(optional($chat->sender)->image) ? asset(optional($chat->sender)->image) : $image_sender }}" class="rounded" alt="" />
                                @else
                                    <img src="{{ isset($user->image) ? asset($user->image) : $image_receiver }}" class="rounded" alt="" />
                                @endif
                                
                                <i>{{ Carbon\Carbon::parse($chat->created_at)->format('h:m a') }}</i>
                            </div>
                            <div class="conversation-text">
                                <div class="ctext-wrap">
                                    <i>{{ optional($chat->sender)->name }}</i>
                                    <p>
                                        {!! $chat->chat !!}
                                    </p>
                                </div>
                            </div>
                            @if ($chat->created_by == auth()->user()->id)
                                <div class="conversation-actions dropdown">
                                <button class="btn btn-sm btn-link" data-bs-toggle="dropdown"
                                    aria-expanded="false"><i class='uil uil-ellipsis-v'></i></button>

                                <div class="dropdown-menu dropdown-menu-end">
                                    {{-- <a class="dropdown-item" href="#">Copy Message</a>
                                    <a class="dropdown-item" href="#">Edit</a> --}}
                                    <a class="dropdown-item" href="#" onclick="delete_item(`{{ route('admin.chats.destroy', $chat->id) }}`)">Delete</a>
                                </div>
                            </div>
                            @endif
                            
                        </li>
                        
                        {{-- @endif --}}
                           
                        @endforeach
                        
                        
                    </ul>
                </div> <!-- end card-body -->
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col">
                            <div class="mt-2 bg-light p-3">
                                <form class="needs-validation" novalidate="" action="{{ route('admin.chats.store') }}"
                                    method="post" id="chat-form">
                                    @csrf
                                    <div class="row">
                                        <div class="col mb-2 mb-sm-0">
                                            <input type="text" class="form-control border-0" name="chat" placeholder="Enter your text" required="">
                                            <input type="hidden" name="receiver_id" value="{{ $user->id }}">
                                            <div class="invalid-feedback">
                                                Please enter your messsage
                                            </div>
                                        </div>
                                        <div class="col-sm-auto">
                                            <div class="btn-group">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-success chat-send"><i class='uil uil-message'></i></button>
                                                </div> 
                                            </div>
                                        </div> <!-- end col -->
                                    </div> <!-- end row-->
                                </form>
                            </div> 
                        </div> <!-- end col-->
                    </div>
                    <!-- end row -->
                </div>
            </div> <!-- end card -->
        </div>
        <!-- end chat area-->

        <!-- start user detail -->
        <div class="col-xxl-3 col-xl-6 order-xl-1 order-xxl-2">
            <div class="card">
                <div class="card-body">
                    @php
                            $avatar = new \Laravolt\Avatar\Avatar();
                            $randomColor = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
                            $image = $avatar->create($user->name)->setBackground($randomColor)->toBase64();
                        @endphp

                    <div class="mt-3 text-center">
                        <img src="{{ isset($user->image) ? asset($user->image) : $image }}" alt=""
                            class="img-thumbnail avatar-lg rounded-circle" />
                        <h4>{{ $user->name }}</h4>
                    </div>

                    <div class="mt-3">
                        <hr class="" />

                        <p class="mt-4 mb-1"><strong><i class='uil uil-at'></i> Email:</strong></p>
                        <p>{{ $user->email }}</p>

                        <p class="mt-3 mb-1"><strong><i class='uil uil-phone'></i> Phone Number:</strong></p>
                        <p>{{ $user->phone }}</p>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <!-- end user detail -->
    </div> <!-- end row-->
@endsection



@section('js')


  


@endsection