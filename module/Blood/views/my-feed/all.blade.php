@extends('layouts.master')

@section('title', 'All Feed')


@section('content')

    <div class="row">


        <div class="col-md-12">


            <!-- header -->

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            
                        </div>
                        <h4 class="page-title">All Feed</h4>
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
                                    <div class="input-group flex-nowrap">
                                        <div class="position-relative" id="datepicker4">
                                            <input type="text" class="form-control" data-provide="datepicker" name="from" autocomplete="off"
                                            data-date-autoclose="true" data-date-container="#datepicker4" data-date-format="m/d/yyyy"
                                            placeholder="From Date">
                                        </div>
                                        <span class="input-group-text" id="basic-addon1"><i class="ri ri-arrow-left-right-line"></i></span>
                                        <div class="position-relative" id="datepicker5">
                                            <input type="text" class="form-control" data-provide="datepicker" name="to" autocomplete="off"
                                            data-date-autoclose="true" data-date-container="#datepicker5" data-date-format="m/d/yyyy"
                                            placeholder="To date">
                                        </div>
                                    </div>
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

            <div class="card">
                <div class="card-body">

                    <div class="row">



                        <div class="col-sm-12">

                            <table class="table table-bordered table-centered mb-0">
                                <thead>
                                <tr>
                                    <th class="text-center">Sl</th>
                                    <th>Created By</th>
                                    <th>Blood Group</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Place</th>
                                    <th>Amount of Blood</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th class="text-center" width="10%">Action</th>
                                </tr>
                                </thead>

                                <tbody>

                                @forelse ($posts as $key => $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ optional($item->created_user)->name }}</td>
                                        <td>{{ $item->blood_group }}</td>
                                        <td>{{  $item->date  }}</td>
                                        <td>{{ $item->time }}</td>
                                        <td>{{ $item->place }}</td>
                                        <td>{{ $item->amount_of_blood }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>
                                            <form id="my-form{{ $item->id }}" method="POST" action="{{ route('admin.posts.status',$item->id) }}">
                                                @csrf
                                                <input type="checkbox" id="switch{{ $item->id }}" name="status" onchange="changeStatus(`{{ $item->id }}`)"
                                                {{ $item->status == 1 ? 'checked' : '' }} data-switch="primary"/>
                                                <label for="switch{{ $item->id }}" data-on-label="On" data-off-label="Off"></label>
                                              </form>
                                        </td>   
                                        <td class="text-center">
                                            <div class="btn-group btn-corner">

                                                <a href="{{ route('admin.posts.edit', $item->id) }}"
                                                   class="btn btn-sm btn-success" title="Edit">
                                                    <i class="ri-edit-2-fill"></i>
                                                </a>

                                                <button type="button"
                                                        onclick="delete_item(`{{ route('admin.posts.destroy', $item->id) }}`)"
                                                        class="btn btn-sm btn-danger" title="Delete">
                                                    <i class="uil-trash-alt"></i>
                                                </button>



                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="30" class="text-center text-danger py-3"
                                            style="background: #eaf4fa80 !important; font-size: 18px">
                                            <strong>No records found!</strong>
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>

                            @include('partials._paginate', ['data' => $posts])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



@section('js')


    <!-- Datatable Script -->
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/custom_js/custom-datatable.js') }}"></script>



    <script>

            function changeStatus(id) {
                
                $('#my-form'+id).submit();
            };

    </script>


@stop

