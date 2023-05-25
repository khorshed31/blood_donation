<!DOCTYPE html>
<html>
<head>
    <title>Reset Pasword Link</title>
</head>
<body>
    <h3>Click Here</h3>
    <a class="btn btn-primary" href="{{ route('reset.password.get', ['email' => $data['email'], 'token' => $data['token']]) }}">Reset Password</a>
   
    <p>Thank you</p>
</body>
</html>