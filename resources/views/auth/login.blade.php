<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('login')}}" method="POST">
        @csrf
        @method('POST')
        <input type="email" name="email">
        <input type="password" name="password">
        <button type="submit">зайти</button>
    </form>
</body>
</html>
