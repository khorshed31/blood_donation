@extends('layouts.master')

@section('title', $user->name.' Profile')

@section('page-header')
    <i class="fa fa-plus-circle"></i> {{ $user->name }} Profile
@stop

@section('css')

@endsection

@section('content')

@include('partials._alert_message')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                    <li class="breadcrumb-item active">{{ $user->name }} Profile</li>
                </ol>
            </div>
            <h4 class="page-title">{{ $user->name }} Profile</h4>
        </div>
    </div>
</div>
<!-- end page title -->

                                    @php
                                        $avatar = new \Laravolt\Avatar\Avatar();
                                        $randomColor = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
                                        $image = $avatar->create($user->name)->setBackground($randomColor)->toBase64();
                                    @endphp

<div class="row">
    <div class="col-xl-4 col-lg-5">
        <div class="card text-center">
            <div class="card-body">
                <img src="{{ isset($user->image) ? asset($user->image) : $image }}" class="rounded-circle avatar-lg img-thumbnail"
                alt="profile-image">

                <h4 class="mb-0 mt-2">{{ $user->name }}</h4>
                <p class="text-muted font-14">{{ $user->role }}</p>

                <div class="text-start mt-3">
                    <h4 class="font-13">About Me :</h4>
                    <p class="text-muted font-13 mb-3">
                        {!! $user->description !!}
                    </p>
                    <p class="text-muted mb-2 font-13"><strong>Blood Group :</strong> <span class="ms-2 text-danger">{{ $user->blood_group }}</span></p>

                    <p class="text-muted mb-2 font-13"><strong>Phone :</strong><span class="ms-2">{{ $user->phone }}</span></p>

                    <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ms-2 ">{{ $user->email }}</span></p>

                    {{-- <p class="text-muted mb-1 font-13"><strong>Location :</strong> <span class="ms-2">USA</span></p> --}}
                </div>

                {{-- <ul class="social-list list-inline mt-3 mb-0">
                    <li class="list-inline-item">
                        <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i
                                class="mdi mdi-facebook"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i
                                class="mdi mdi-google"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="javascript: void(0);" class="social-list-item border-info text-info"><i
                                class="mdi mdi-twitter"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i
                                class="mdi mdi-github"></i></a>
                    </li>
                </ul> --}}
            </div> <!-- end card-body -->
        </div> <!-- end card -->

        {{-- <!-- Messages-->
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h4 class="header-title">Messages</h4>
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                        </div>
                    </div>
                </div>

                <div class="inbox-widget">
                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="assets/images/users/avatar-2.jpg" class="rounded-circle" alt=""></div>
                        <p class="inbox-item-author">Tomaslau</p>
                        <p class="inbox-item-text">I've finished it! See you so...</p>
                        <p class="inbox-item-date">
                            <a href="#" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                        </p>
                    </div>
                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="assets/images/users/avatar-3.jpg" class="rounded-circle" alt=""></div>
                        <p class="inbox-item-author">Stillnotdavid</p>
                        <p class="inbox-item-text">This theme is awesome!</p>
                        <p class="inbox-item-date">
                            <a href="#" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                        </p>
                    </div>
                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="assets/images/users/avatar-4.jpg" class="rounded-circle" alt=""></div>
                        <p class="inbox-item-author">Kurafire</p>
                        <p class="inbox-item-text">Nice to meet you</p>
                        <p class="inbox-item-date">
                            <a href="#" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                        </p>
                    </div>

                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="assets/images/users/avatar-5.jpg" class="rounded-circle" alt=""></div>
                        <p class="inbox-item-author">Shahedk</p>
                        <p class="inbox-item-text">Hey! there I'm available...</p>
                        <p class="inbox-item-date">
                            <a href="#" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                        </p>
                    </div>
                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="assets/images/users/avatar-6.jpg" class="rounded-circle" alt=""></div>
                        <p class="inbox-item-author">Adhamdannaway</p>
                        <p class="inbox-item-text">This theme is awesome!</p>
                        <p class="inbox-item-date">
                            <a href="#" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                        </p>
                    </div>
                </div> <!-- end inbox-widget -->
            </div> <!-- end card-body-->
        </div> <!-- end card--> --}}

    </div> <!-- end col-->

    <div class="col-xl-8 col-lg-7">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                    <li class="nav-item">
                        <a href="#settings" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0 active">
                            Settings
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#change_pass" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0 ">
                            Change Password
                        </a>
                    </li>
                </ul>
                <div class="tab-content">

                    <div class="tab-pane show active" id="settings">
                        <form action="{{ route('admin.profile.store') }}" method="POST" id="validateForm" enctype="multipart/form-data">
                            @csrf
                            <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Personal Info</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="firstname" class="form-label">Full Name</label>
                                        <input type="text" class="form-control" name="name" value="{{ $user->name }}"
                                        validate="name" id="firstname" placeholder="Enter full name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="useremail" class="form-label">Email Address</label>
                                        <input type="email" class="form-control" name="email" validate="email"
                                         value="{{ $user->email }}" id="useremail" placeholder="Enter email" readonly>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" class="form-control" name="phone" value="{{ $user->phone }}"
                                        validate="phone" id="phone" placeholder="Enter phone">
                                    </div>
                                </div>
                            </div> <!-- end row -->

                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="userbio" class="form-label">Bio</label>
                                        <textarea class="form-control" id="userbio" rows="4" name="description" placeholder="Write something...">{{ $user->description }}</textarea>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Blood Group</label>
                                        <select name="blood_group" class="select2 form-control"
                                            data-placeholder="-Select Blood Group-">
                                        <option value=""></option>

                                        @foreach (blood_groups() as $item)
                                            <option value="{{ $item }}" {{ $item == $user->blood_group ? 'selected' : '' }}>
                                                {{ $item }}
                                            </option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">City</label>
                                        <select name="city" class="select2 form-control"
                                            data-placeholder="-Select City-">
                                        <option value=""></option>

                                        @foreach ($cities as $item)
                                            <option value="{{ $item->name }}" {{ $item->name == $user->city ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="age" class="form-label">Age</label>
                                        <input type="text" class="form-control" name="age" value="{{ $user->age }}" id="age" placeholder="Enter Age">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Image</label>
                                        <input type="file" class="form-control" name="image">
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                            
                            <div class="text-end">
                                <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                            </div>
                        </form>
                    </div>
                    <!-- end settings content-->

                    <div class="tab-pane" id="change_pass">
                        <form action="{{ route('admin.change.password') }}" method="POST" id="validateForm" enctype="multipart/form-data">
                            @csrf
                            <h5 class="mb-4 text-uppercase"><i class="ri ri-lock-password-line me-1"></i> Change Password</h5>



                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        
                                        <label for="password" class="form-label">Old Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" name="old_password" class="form-control" placeholder="Enter old password">
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end row -->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="password" class="form-label">New Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" name="new_password" class="form-control" placeholder="Enter old password">
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Confirm Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" name="confirm_password" class="form-control" placeholder="Enter confirm password">
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                            
                            <div class="text-end">
                                <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i> Update</button>
                            </div>
                        </form>
                    </div>
                    <!-- end change pass content-->

                </div> <!-- end tab-content -->
            </div> <!-- end card body -->
        </div> <!-- end card -->
    </div> <!-- end col -->
</div>
<!-- end row-->

    
@endsection



@section('js')


  


@endsection