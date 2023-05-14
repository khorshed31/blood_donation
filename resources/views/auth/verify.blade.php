<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8" />
    <title>OTP Validation | Blood Donation System</title>
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


        <style>
            .verification-code {
                max-width: 300px;
                position: relative;
                margin:50px auto;
                text-align:center;
            }
            .control-label{
            display:block;
            margin:40px auto;
            font-weight:900;
            }
            .verification-code--inputs input[type=text] {
                border: 2px solid #e1e1e1;
                width: 46px;
                height: 46px;
                padding: 10px;
                text-align: center;
                display: inline-block;
            box-sizing:border-box;
            }
        </style>

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
                                    <h4 class="text-dark-50 text-center mt-0 fw-bold">OTP Verify</h4>
                                    <p class="text-muted mb-4">Enter your verify code to login.</p>
                                </div>
                                @if (\Session::has('message'))
                                <div class="alert alert-info" style="padding: 6px;margin: 0px;">
                                    {!! \Session::get('message') !!}
                                </div>
                            @endif

                                <form action="{{ route('signup.varify') }}" method="POST">

                                    @csrf

                                    <div class="verification-code">
                                        <label class="control-label">Please check your mail</label>
                                        <div class="verification-code--inputs">
                                          <input type="text" maxlength="1" />
                                          <input type="text" maxlength="1" />
                                          <input type="text" maxlength="1" />
                                          <input type="text" maxlength="1" />
                                    
                                        </div>
                                        <input type="hidden" name="code" id="verificationCode"/>

                                        <input type="hidden" name="email" value="{{ $userOTP->email }}"/>
                                        <input type="hidden" name="name" value="{{ $userInfo['name'] }}"/>
                                        <input type="hidden" name="phone" value="{{ $userInfo['phone'] }}"/>
                                        <input type="hidden" name="blood_group" value="{{ $userInfo['blood_group'] }}"/>
                                        <input type="hidden" name="city" value="{{ $userInfo['city'] }}"/>
                                        <input type="hidden" name="age" value="{{ $userInfo['age'] }}"/>
                                        <input type="hidden" name="password" value="{{ $userInfo['password'] }}"/>
                                        <input type="hidden" name="code" id="code" value="{{ $userInfo['code'] }}"/>
                                    
                                      </div>

                                    <div class="mb-0 text-center">
                                        <button class="btn btn-success" type="submit" id="verify_submit_btn" disabled>Varify</button>
                                    </div>
                                </form>

                                <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-muted">Back to <a href="{{ route('login') }}" class="text-muted ms-1"><b>Log In</b></a></p>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
                            </div> <!-- end card-body-->
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
        <script src="{{ asset('assets/js/vendor.min.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('assets/js/app.min.js') }}"></script>

        <script>
            //Code Verification
            var verificationCode = [];
            $(".verification-code input[type=text]").keyup(function (e) {
            
            // Get Input for Hidden Field
            $(".verification-code input[type=text]").each(function (i) {
                verificationCode[i] = $(".verification-code input[type=text]")[i].value; 
                $('#verificationCode').val(Number(verificationCode.join('')));
                //console.log( $('#verificationCode').val() );
            });

            //console.log(event.key, event.which);

            if ($(this).val() > 0) {
                if (event.key == 1 || event.key == 2 || event.key == 3 || event.key == 4 || event.key == 5 || event.key == 6 || event.key == 7 || event.key == 8 || event.key == 9 || event.key == 0) {
                $(this).next().focus();
                }
            }else {
                if(event.key == 'Backspace'){
                    $(this).prev().focus();
                }
            }

            let code = $("#code").val();
            let input_code = $("#verificationCode").val();

            if (code == input_code) {
                $('#verify_submit_btn').prop('disabled', false);
            }
            else {
                $('#verify_submit_btn').prop('disabled', true);
            }

            }); // keyup

            $('.verification-code input').on("paste",function(event,pastedValue){
            $('#txt').val($content)
            // console.log($content)
            //console.log(values)
            });

            $editor.on('paste, keydown', function() {
            var $self = $(this);            
                        setTimeout(function(){ 
                            var $content = $self.html();             
                            $clipboard.val($content);
                        },100);
                });




        </script>

    </body>


</html>

