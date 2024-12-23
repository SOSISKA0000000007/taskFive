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
<div>
    <h2>{{$lot->title}}</h2>
    <p>{{$lot->description}}</p>
    <span>{{$lot->current_bid}}</span>

    <form action="{{route('lot.update', $lot->id)}}" method="POST">
        @csrf
        @method('PATCH')
        <input type="text" name="current_bid">
        <button type="submit">Увеличить</button>
    </form>


    <form action="{{route('lot.closeLot', $lot->id)}}" method="POST">
        @csrf
        @method('PATCH')
        <button type="submit">Закрыть</button>
    </form>
</div>
</body>
</html>
