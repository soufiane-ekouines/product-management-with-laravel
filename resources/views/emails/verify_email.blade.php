<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>{{$user->name}} <br> Welcome to the best website soufiane ekouines</h1>
    <p>
        plz <a href="{{ url('user/verification/'.$ver->token) }}">clik</a> in this link to verify your acount
    </p>
</body>
</html>