<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Reset Password | Blood Donation System</title>
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

                        <form action="{{ route('reset.password.post') }}" method="POST" id="validateForm">
                            @csrf
                            @if (\Session::has('message'))
                                <div class="alert alert-info" style="padding: 6px;margin: 0px;">
                                    {!! \Session::get('message') !!}
                                </div>
                            @endif

                            <input type="hidden" name="email_token" value="{{ $token }}">
                            <input type="hidden" name="email" value="{{ $email }}">

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" name="password" class="form-control input_pass" placeholder="Enter your password" required>
                                    <div class="input-group-text" data-password="false">
                                        <span class="password-eye"></span>
                                    </div>
                                </div>
                            </div>

                            <p class="text-danger pass_worning"></p>

                            <div class="mb-3">
                                <label for="password" class="form-label">Confirm Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control input_pass" placeholder="Enter confirm password">
                                    <div class="input-group-text" data-password="false">
                                        <span class="password-eye"></span>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="mb-3 mb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
                                    <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                </div>
                            </div> --}}

                            <div class="mb-3 mb-0 text-center">
                                <button class="btn btn-success reset_btn" type="submit"> Reset Password </button>
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


    $('#password_confirmation').on('keyup',function () {

        let password = Number($('#password').val())
        let cpassword = Number($(this).val())

        if (password == cpassword){
            $(".reset_btn").prop("disabled", false);
            $('.pass_worning').empty()
        }
        else{
            $(".reset_btn").prop("disabled", true);
            $('.pass_worning').text('Password Do Not Matched')
        }


})


</script>

</body>

</html>

