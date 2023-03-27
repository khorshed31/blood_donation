@extends('layouts.master')

@section('title', 'All Users')


@section('content')

    <div class="row">


        <div class="col-md-12">


            <!-- header -->

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                        </div>
                        <h4 class="page-title">All Users</h4>
                    </div>
                </div>
            </div>

        @include('partials._alert_message')


        <!-- Searching -->
            <div class="row">
                <div class="col-sm-12">
                    <form action="">
                        <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
                            <tbody>
                            <tr>
                                <td>
                                    <select name="blood_group" class="select2 form-control"
                                            data-placeholder="-Select Blood Group-">
                                        <option value=""></option>

                                        @foreach (blood_groups() as $item)
                                            <option value="{{ $item }}" {{ $item == request('blood_group') ? 'selected' : '' }}>
                                                {{ $item }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="name" class="form-control" value="{{ request('name') }}" placeholder="Enter Name...">
                                </td>

                                <td>
                                    <div class="btn-group btn-corner">
                                        <button type="submit" class="btn btn-sm btn-success">
                                            <i class="uil-search"></i> Search
                                        </button>
                                        <a href="{{ request()->url() }}" class="btn btn-sm btn-light">
                                            <i class="uil-refresh"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </form>
                </div>

            </div>


            <div class="row">

                @foreach ($users as $user)

                    @php
                        $avatar = new \Laravolt\Avatar\Avatar();
                        $randomColor = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
                        $image = $avatar->create($user->name)->setBackground($randomColor)->toBase64();

                        $unread_chats = Module\Blood\Models\Chat::where('sender_id', auth()->user()->id)->where('is_read',0)->where('receiver_id',$user->id)->count();
                    @endphp
                    <div class="col-md-6 col-xxl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown float-end">
                            </div>

                            <div class="text-center">
                                <img src="{{ isset($user->image) ? asset($user->image) : $image }}" class="rounded-circle avatar-md img-thumbnail" alt="friend">
                                <h4 class="mt-3 my-1">{{ $user->name }}</h4>
                                <p class="mb-0 text-muted"><i class="mdi mdi-email-outline me-1"></i>{{ $user->email }}</p>
                                <hr class="bg-dark-lighten my-3">
                                <h5 class="mb-0 text-muted"><i class="mdi mdi-blood-bag text-danger"></i> Blood Group: <b class="text-danger">{{ $user->blood_group }}</b></h5>
                            
                                <div class="row mt-3">
                                    <div class="col-4">
                                        <a href="{{ route('admin.chats.show', $user->id) }}" class="btn w-100 btn-light" data-bs-toggle="tooltip" data-bs-placement="top" title="Message"><i class="mdi mdi-message-processing-outline">
                                        <sup class="text-danger"><b>{{ $unread_chats > 0 ? $unread_chats : '' }}</b></sup></i></a>
                                    </div>
                                    <div class="col-4">
                                        <a href="tel:{{ $user->phone }}" class="btn w-100 btn-light" data-bs-toggle="tooltip" data-bs-placement="top" title="Call"><i class="mdi mdi-phone"></i></a>
                                    </div>
                                    <div class="col-4">
                                        <a href="mailto:{{ $user->email }}" class="btn w-100 btn-light" data-bs-toggle="tooltip" data-bs-placement="top" title="Email"><i class="mdi mdi-email-outline"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End col -->
                @endforeach

                
            </div> <!-- End row -->

            @include('partials._paginate', ['data' => $users])

        </div>
    </div>

@endsection



@section('js')


    <!-- Datatable Script -->
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/custom_js/custom-datatable.js') }}"></script>


@stop

