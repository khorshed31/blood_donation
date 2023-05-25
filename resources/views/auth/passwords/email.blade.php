<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Sent Email | Blood Donation System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- Theme Config Js -->
    <script src="{{ asset('assets/js/hyper-config.js') }}"></script>

    <!-- App css -->
    <link href="{{ asset('assets/css/app-saas.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{ asset('assets/custom_css/validin.css') }}" />

</head>

<body class="authentication-bg">
<div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-4 col-lg-5">
                <div class="card">

                    <!-- Logo -->
                    <div class="card-header pt-4 pb-4 text-center bg-success">
                        <a href="index.html">
                            <span><img src="{{ asset('assets/images/blood.png') }}" alt="logo" height="65"></span>
                        </a>
                    </div>

                    <div class="card-body p-4">

                        <div class="text-center w-75 m-auto">
                            <h4 class="text-dark-50 text-center mt-0 fw-bold">Reset Password</h4>
                            <p class="text-muted mb-4">Enter your email address and we'll send you an email with instructions to reset your password.</p>
                        </div>

                        <form action="{{ route('forget.password.post') }}" method="POST" id="validateForm">
                            @csrf
                            @if (\Session::has('message'))
                                <div class="alert alert-info" style="padding: 6px;margin: 0px;">
                                    {!! \Session::get('message') !!}
                                </div>
                            @endif

                            <div class="mb-3">
                                <label for="emailaddress" class="form-label">Email address</label>
                                <input class="form-control" name="email" type="email" validate="email"
                                 id="emailaddress" required="" placeholder="Enter your email">
                            </div>

                            {{-- <div class="mb-3 mb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
                                    <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                </div>
                            </div> --}}

                            <div class="mb-3 mb-0 text-center">
                                <button class="btn btn-success" type="submit"> Send Mail </button>
                            </div>

                        </form>
                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p class="text-muted">Back to <a href="{{ url('/') }}" class="text-muted ms-1"><b>Log In</b></a></p>
                    </div> <!-- end col -->
                </div>

                <!-- end row -->

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
<script src="{{ asset('assets/js/vendor.min.js') }}"></script>

<!-- App js -->
<script src="{{ asset('assets/js/app.min.js') }}"></script>


<script src="{{ asset('assets/custom_js/validin.js') }}"></script>

<script>
    // Validate Email
    $('#validateForm').validin();
</script>

</body>

</html>

