<!DOCTYPE html>
<html>
<head>
    <title>Welcome to E-Matilde</title>
</head>

<body>
<h2>Welcome to the site {{$user->nombre_usuario}}</h2>
<br/>
Your registered email-id is {{$user->email}} , Please click on the below link to verify your email account
<br/>
<a href="{{url('http://localhost:4200/verify?token='.$user->verifyUser->token)}}">Verify Email</a>
</body>

</html>