@extends('layouts.master')

@section('title', 'Add Post')

@section('page-header')
    <i class="fa fa-plus-circle"></i> Add Post
@stop

@section('css')

{{-- <style>
    .datepicker-wrapper {
        position: relative !important;
    }

    .datepicker-wrapper .datepicker-dropdown {
        top: 100% !important;
        bottom: auto !important;
    }
</style> --}}

@endsection

@section('content')



    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                        {{-- <li class="breadcrumb-item"><a href="{{ route('admin.blogs.index') }}">Blogs</a></li> --}}
                        <li class="breadcrumb-item active">Add</li>
                    </ol>
                </div>
                <h4 class="page-title">Add Post</h4>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-8 mx-auto">


            @include('partials._alert_message')




            <div class="card">

                <!-- body -->
                <div class="card-body">
                    <div class="widget-main">



                        <form method="POST" action="{{ route('admin.posts.store') }}" class="form-horizontal"
                              enctype="multipart/form-data" id="validateForm">
                        @csrf

                        <div class="row">
                            <div class="col-md-8 mx-auto">
                                <label class="form-label">Blood Group <sup class="text-danger">*</sup>: </label>
                                <select class="form-control select2" name="blood_group" 
                                    data-placeholder="-- Select Blood Group --" required>
                                        <option></option>
                                        @foreach (blood_groups() as $item)
                                            <option value="{{ $item }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-8 mx-auto">
                                <label class="form-label">Donation Date <sup class="text-danger">*</sup>: </label>
                                {{-- <div class="position-relative">
                                    <input type="text" id="datepicker11" class="form-control" data-date-format="m/d/yyyy" 
                                    value="{{ Carbon\Carbon::now()->format('m/d/Y') }}" required>
                                </div> --}}
                                <div class="datepicker-wrapper">
                                    <input type="text" class="form-control" data-provide="datepicker" name="date" autocomplete="off"
                                    data-date-autoclose="true" id="datepicker11" data-date-format="m/d/yyyy"
                                    value="{{ Carbon\Carbon::now()->format('m/d/Y') }}" required>
                                </div>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-8 mx-auto">
                                <label class="form-label">Donation Time <sup class="text-danger">*</sup>:</label>
                                <div class="input-group position-relative" id="timepicker-input-group3">
                                    <input id="timepicker3" type="text" class="form-control" name="time"
                                    data-provide='timepicker' data-minute-step="5" required>
                                </div>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-8 mx-auto">
                                <label class="form-label">Place <sup class="text-danger">*</sup>:</label>
                                <textarea name="place" id="" class="form-control"></textarea>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-8 mx-auto">
                                <label class="form-label">Amount of Blood <sup class="text-danger">*</sup>:</label>
                                <input type="text" name="amount_of_blood" class="form-control">
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-8 mx-auto">
                                <label class="form-label">Phone Number <sup class="text-danger">*</sup>:</label>
                                <input type="number" validate="phone" name="phone" class="form-control">
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-8 mx-auto">
                                <label class="form-label">Reason <sup class="text-danger">*</sup>:</label>
                                <textarea name="reason" id="" class="form-control"></textarea>
                            </div>
                        </div><br>



                           <!-- Action -->
                           <div class="row">
                            <div class="col-md-8 mx-auto">
                                <button type="submit" class="btn btn-primary">
                                    <i class="ri ri-add-line"></i> Request
                                </button>
                            </div>
                        </div><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('js')


  <script>
      
      $(document).ready(function() {
  // Initialize the datepicker
  $('#datepicker11').datepicker({
    startDate: '0d', // Set the minimum date to today
    autoclose: true, // Close the datepicker when a date is selected
    showOnFocus: false // Do not show the datepicker on input focus
  });

  // Open the datepicker when the input is clicked
  $('#datepicker11').on('focus', function() {
    $(this).datepicker('show');
  });
});


  </script>


@endsection