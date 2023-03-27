<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8" />
        <title>Register | Blood Donation System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Select2 css -->
        <link href="{{ asset('assets/vendor/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />

        <link type="text/css" rel="stylesheet" href="{{ asset('frontend/css/validin.css') }}" />

        <!-- Theme Config Js -->
        <script src="assets/js/hyper-config.js"></script>

        <!-- App css -->
        <link href="assets/css/app-saas.min.css" rel="stylesheet" type="text/css" id="app-style" />

        <!-- Icons css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" href="{{ asset('assets/custom_css/validin.css') }}" />
    </head>

    <body class="authentication-bg">

        <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-4 col-lg-5">
                        <div class="card">
                            <!-- Logo-->
                            <div class="card-header pt-4 pb-4 text-center bg-success">
                                <a href="index.html">
                                    <span><img src="assets/images/blood.png" alt="logo" height="65"></span>
                                </a>
                            </div>

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <h4 class="text-dark-50 text-center mt-0 fw-bold">Free Sign Up</h4>
                                    <p class="text-muted mb-4">Don't have an account? Create your account, it takes less than a minute </p>
                                </div>

                                @if (\Session::has('message'))
                                    <div class="alert alert-info" style="padding: 6px;margin: 0px;">
                                        {!! \Session::get('message') !!}
                                    </div>
                                @endif
                                <form action="{{ route('signup.store') }}" method="GET" id="validateForm">

                                @csrf

                                    <div class="mb-3">
                                        <label for="fullname" class="form-label">Full Name</label>
                                        <input class="form-control" type="text" id="fullname" name="name" validate="name"
                                         placeholder="Enter your name" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="emailaddress" class="form-label">Email address</label>
                                        <input class="form-control" type="email" name="email" validate="email" id="emailaddress" required placeholder="Enter your email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone Number</label>
                                        <input class="form-control" type="number" name="phone" validate="phone" id="phone" required placeholder="Enter your phone">
                                    </div>

                                    @php
                                        $bloodgroups = ['A+','B+','O+','AB+','A-','B-','O-','AB-']
                                    @endphp
                                    
                                    <div class="mb-3">
                                        <label for="emailaddress" class="form-label">Blood Group</label>
                                        <select class="form-control select2" name="blood_group" data-placeholder="-- Select Blood Group --">
                                            <option></option>
                                            @foreach ($bloodgroups as $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="emailaddress" class="form-label">City</label>
                                        <select class="form-control select2" name="city" data-placeholder="-- Select City --">
                                            <option></option>
                                            @foreach ($cities as $item)
                                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="age" class="form-label">Age</label>
                                        <input class="form-control" type="number" id="age" name="age" required placeholder="Enter your Age">
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password">
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div class="mb-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="checkbox-signup">
                                            <label class="form-check-label" for="checkbox-signup">I accept <a href="#" class="text-muted">Terms and Conditions</a></label>
                                        </div>
                                    </div> --}}

                                    <div class="mb-3 text-center">
                                        <button class="btn btn-success" type="submit"> Sign Up </button>
                                    </div>

                                </form>
                                 <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-muted">Already have account? <a href="{{ route('login') }}" class="text-muted ms-1"><b>Log In</b></a></p>
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->
                            </div> <!-- end card-body -->
                        </div>
                       

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <footer class="footer footer-alt">
            2022 - <script>document.write(new Date().getFullYear())</script> © Rafi & Shakil -
        </footer>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>
        
        <!-- App js -->
        <script src="assets/js/app.min.js"></script>

        <!--  Select2 Plugin Js -->
        <script src="{{ asset('assets/vendor/select2/js/select2.min.js') }}"></script>

        <script src="{{ asset('assets/custom_js/validin.js') }}"></script>

        <script>
            $(document).ready(function(){
                $('.select2').select2({})
            })

            // Validate Email
            $('#validateForm').validin();
        </script>

    </body>

</html>
