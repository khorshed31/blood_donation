@extends('layouts.master')
@section('css')

<style>
    .donate_color{
        border: 2px solid #ab0a0a;
    }
</style>
    
@endsection

@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Apps</a></li>
                        <li class="breadcrumb-item active">Social Feed</li> --}}
                    </ol>
                </div>
                <h4 class="page-title">Blood Donation</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    
    <div class="row">
        <div class="col-xxl-3 col-lg-6 order-lg-1 order-xxl-1">
            <!-- start profile info -->
            <div class="card">
                <div class="card-body">
                    <h5 class="page-title">Search By Blood Group</h5>

                    @foreach (blood_groups() as $name)
                    <div class="form-check form-checkbox-success custom-checkbox">
                        <input type="checkbox" name="blood_group" onchange="fetchData()" value="{{ $name }}" class="form-check-input" id="customCheckcolor{{ $name }}">
                        <label class="form-check-label" for="customCheckcolor{{ $name }}">{{ $name }}</label>
                    </div>
                    {{-- <div class="custom-checkbox">
                        <input type="checkbox" name="blood_group" id="checkbox{{ $name }}" value="{{ $name }}">
                        <label for="checkbox{{ $name }}" class="search-data">{{ $name }}</label>
                    </div>                             --}}
                @endforeach

                </div>
            </div>
            <!-- end profile info -->

            <!-- event info -->
            <div class="card">
                <div class="card-body p-2">
                    <div class="list-group list-group-flush my-2">
                        <a href="{{ route('admin.posts.create') }}" class="btn btn-danger">
                            <i class='mdi mdi-blood-bag'></i> Request Blood</a>
                    </div>
                </div>
            </div>
            <!-- end event info -->

            <!-- news -->
            {{-- <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h4 class="header-title">Trending</h4>
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-horizontal"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Today</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Yesterday</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Last Week</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Last Month</a>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex mt-3">
                        <i class='uil uil-arrow-growth me-2 font-18 text-primary'></i>
                        <div>
                            <a class="mt-1 font-14" href="javascript:void(0);">
                                <strong>Golden Globes:</strong>
                                <span class="text-muted">
                                    The 27 Best moments from the Golden Globe Awards
                                </span>
                            </a>
                        </div>
                    </div>

                    <div class="d-flex mt-3">
                        <i class='uil uil-arrow-growth me-2 font-18 text-primary'></i>
                        <div>
                            <a class="mt-1 font-14" href="javascript:void(0);">
                                <strong>World Cricket:</strong>
                                <span class="text-muted">
                                    India has won ICC T20 World Cup Yesterday
                                </span>
                            </a>
                        </div>
                    </div>

                    <div class="d-flex mt-3">
                        <i class='uil uil-arrow-growth me-2 font-18 text-primary'></i>
                        <div>
                            <a class="mt-1 font-14" href="javascript:void(0);">
                                <strong>Antartica:</strong>
                                <span class="text-muted">
                                    Metling of Totten Glacier could cause high risk to areas near by sea
                                </span>
                            </a>
                        </div>
                    </div>

                </div> <!-- end card-body-->
            </div> <!-- end card--> --}}
        </div> <!-- end col -->

        <div class="col-xxl-6 col-lg-12 order-lg-2 order-xxl-1">
            <!-- new post -->
            {{-- <div class="card">
                <div class="card-body p-0">
                    <div class="tab-content">
                        <div class="tab-pane show active p-3" id="newpost">
                            <!-- comment box -->
                            <div class="border rounded">
                                @if (request()->routeIs('admin.posts.edit'))

                                <form action="{{ route('admin.posts.update', $post->id) }}" class="comment-area-box" method="POST">
                                    @csrf
                                    @method('PUT')
                                
                                    <select class="form-control select2" name="blood_group" 
                                    data-placeholder="-- Select Blood Group --" required>
                                        <option></option>
                                        @foreach ($bloodgroups as $item)
                                            <option value="{{ $item }}" {{ $post->blood_group == $item ? 'selected' : '' }}>{{ $item }}</option>
                                        @endforeach
                                    </select><br>
                                    <br><textarea rows="4" class="form-control border-0 resize-none" name="description" 
                                    placeholder="Write something...." required>{{ $post->description }}</textarea>
                                    <div class="p-2 bg-light d-flex justify-content-between align-items-center">
                                        <button type="submit" class="btn btn-sm btn-success"><i class='uil uil-message me-1'></i>Update</button>
                                    </div>
                                </form>
                                    
                                @else
                                    <form action="{{ route('admin.posts.store') }}" class="comment-area-box" method="POST">
                                        @csrf
                                        @php
                                            $bloodgroups = ['A+','B+','O+','AB+','A-','B-','O-','AB-']
                                        @endphp
                                        <select class="form-control select2" name="blood_group" 
                                        data-placeholder="-- Select Blood Group --" required>
                                            <option></option>
                                            @foreach ($bloodgroups as $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select><br>
                                        <br><textarea rows="4" class="form-control border-0 resize-none" name="description" 
                                        placeholder="Write something...." required></textarea>
                                        <div class="p-2 bg-light d-flex justify-content-between align-items-center">
                                            <button type="submit" class="btn btn-sm btn-success"><i class='uil uil-message me-1'></i>Post</button>
                                        </div>
                                    </form>
                                @endif
                                
                            </div> <!-- end .border-->
                            <!-- end comment box -->
                        </div> <!-- end preview-->
                    </div> <!-- end tab-content-->
                </div>
            </div> --}}
            <!-- end new post -->

            <!-- start news feeds -->
            <div class="post_load">
                @include('home/_inc/post')
            </div>
            
            

            <!-- end news feeds -->

            <!-- loader -->
            <div class="text-center mb-3 ajax-load" style="display: none;">
                <a href="javascript:void(0);" class="text-danger"><i class="mdi mdi-spin mdi-loading me-1 font-16"></i> Load more </a>
            </div>
            <!-- end loader -->
        </div>

        <div class="col-xxl-3 col-lg-6 order-lg-1 order-xxl-2">
            <!-- video -->
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="header-title text-danger">Check here if you have given blood</h4>
                    </div>

                    <div class="mt-2">
                        <div class="ratio" style="padding: 10px;">
                            <form id="is_blood_donate" method="POST" action="{{ route('admin.is_donate.store') }}">
                                @csrf
                                <input type="checkbox" id="switch3" {{ optional(isDonate())->is_blood_donate == 1 ? 'checked' : '' }} name="is_blood_donate" data-switch="primary"/>
                                <label for="switch3" data-on-label="Yes" data-off-label="No"></label>
                                <input type="hidden" name="date" value="{{ Carbon\Carbon::now()->format('m/d/Y')  }}">
                              </form>
                        </div><br>
                        @if (isDonate())
                            <span class="badge badge-outline-success">
                            Donate date : {{ Carbon\Carbon::parse(optional(isDonate())->date)->format('d F Y') }}
                        </span>
                        @endif
                        
                    </div>
                </div> <!-- end card-body -->
            </div>
            <!-- end video -->

            <!-- video -->
            {{-- <div class="card">
                <div class="card-body pb-0">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h4 class="header-title">People you may know</h4>
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="mdi mdi-dots-horizontal"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">View All</a>
                            </div>
                        </div>
                    </div>

                    <div class="inbox-widget">
                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="assets/images/users/avatar-2.jpg" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author">Robb Stark</p>
                            <p class="inbox-item-text">The first king in the North</p>
                            <p class="inbox-item-date">
                                <button type="button" class="btn btn-sm btn-outline-primary px-1 py-0"> <i class='uil uil-user-plus font-16'></i> </button>
                            </p>
                        </div>
                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="assets/images/users/avatar-3.jpg" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author">Stillnot David </p>
                            <p class="inbox-item-text">Lady of winterfall</p>
                            <p class="inbox-item-date">
                                <button type="button" class="btn btn-sm btn-outline-primary px-1 py-0"> <i class='uil uil-user-plus font-16'></i> </button>
                            </p>
                        </div>
                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="assets/images/users/avatar-4.jpg" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author">Cersei Lannister</p>
                            <p class="inbox-item-text">Queen of the Seven Kingdoms</p>
                            <p class="inbox-item-date">
                                <button type="button" class="btn btn-sm btn-outline-primary px-1 py-0"> <i class='uil uil-user-plus font-16'></i> </button>
                            </p>
                        </div>

                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="assets/images/users/avatar-5.jpg" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author">Daenerys Targaryen</p>
                            <p class="inbox-item-text">Hey! there I'm available...</p>
                            <p class="inbox-item-date">
                                <button type="button" class="btn btn-sm btn-outline-primary px-1 py-0"> <i class='uil uil-user-plus font-16'></i> </button>
                            </p>
                        </div>
                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="assets/images/users/avatar-6.jpg" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author">Adhamd Annaway</p>
                            <p class="inbox-item-text">Queen Daenerys</p>
                            <p class="inbox-item-date">
                                <button type="button" class="btn btn-sm btn-outline-primary px-1 py-0"> <i class='uil uil-user-plus font-16'></i> </button>
                            </p>
                        </div>
                    </div> <!-- end inbox-widget -->    

                    <div class="mt-2 mb-3 text-center">
                        <a href="#">View More<i class='uil uil-arrow-right ms-1'></i></a>
                    </div>

                </div> <!-- end card-body -->
            </div> --}}
            <!-- end video -->
        </div> <!-- end col -->
    </div> <!--end row -->
@endsection
@section('script')

@include('home._inc.script')



    <script>

        $(document).ready(function() {
            $('#switch3').change(function() {
                $('#is_blood_donate').submit();
            });
        });

    </script>


@endsection
