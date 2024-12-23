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
@if(Auth::user()->is_certified)
    <form action="{{route('lot.store')}}" method="POST">
        @csrf
        @method('POST')
        <label>тайтел
        <input name="title">
        </label>
        <label>дескрипшон
        <input name="description">
        </label>
        <label>куррент бид
        <input name="current_bid">
        </label>
        <button type="submit">Отправить</button>
    </form>
@endif
<ul>
    @foreach($lots as $lot)
        <a href="{{route('lot.show', $lot->id)}}">
            <li>
                <h2>{{$lot->title}}</h2>
                <p>{{$lot->description}}</p>
                <span>{{$lot->current_bid}}</span>
            </li>
        </a>
    @endforeach
</ul>
</body>
</html>
