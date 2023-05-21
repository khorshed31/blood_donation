@extends('layouts.master')

@section('title', 'Edit Post')

@section('page-header')
    <i class="fa fa-plus-circle"></i> Edit Post
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
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
                <h4 class="page-title">Edit Post</h4>
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



                        <form method="POST" action="{{ route('admin.posts.update',$post->id) }}" class="form-horizontal"
                              enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-8 mx-auto">
                                <label class="form-label">Blood Group <sup class="text-danger">*</sup>: </label>
                                <select class="form-control select2" name="blood_group" 
                                    data-placeholder="-- Select Blood Group --" required>
                                        <option></option>
                                        @foreach (blood_groups() as $item)
                                            <option value="{{ $item }}" {{ $post->blood_group == $item ? 'selected' : '' }}>{{ $item }}</option>
                                        @endforeach
                                    </select>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-8 mx-auto">
                                <label class="form-label">Date <sup class="text-danger">*</sup>: </label>
                                <div class="datepicker-wrapper">
                                    <input type="text" class="form-control" data-provide="datepicker" name="date" autocomplete="off"
                                    data-date-autoclose="true" id="datepicker11" data-date-format="m/d/yyyy"
                                    value="{{ $post->date }}" required>
                                </div>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-8 mx-auto">
                                <label class="form-label">Time <sup class="text-danger">*</sup>:</label>
                                <div class="input-group position-relative" id="timepicker-input-group3">
                                    <input id="timepicker3" type="text" class="form-control" name="time"
                                    data-provide='timepicker' data-minute-step="5" value="{{ $post->time }}" required>
                                </div>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-8 mx-auto">
                                <label class="form-label">Place <sup class="text-danger">*</sup>:</label>
                                <textarea name="place" id="" class="form-control">{{ $post->place }}</textarea>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-8 mx-auto">
                                <label class="form-label">Amount of Blood <sup class="text-danger">*</sup>:</label>
                                <input type="text" name="amount_of_blood" value="{{ $post->amount_of_blood }}" class="form-control">
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-8 mx-auto">
                                <label class="form-label">Phone Number <sup class="text-danger">*</sup>:</label>
                                <input type="number" name="phone" value="{{ $post->phone }}" class="form-control">
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-8 mx-auto">
                                <label class="form-label">Reason <sup class="text-danger">*</sup>:</label>
                                <textarea name="reason" id="" class="form-control">{{ $post->reason }}</textarea>
                            </div>
                        </div><br>



                            <!-- Action -->
                            <div class="row">
                                <div class="col-md-8 mx-auto">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-plus"></i> Update
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