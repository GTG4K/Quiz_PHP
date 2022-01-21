<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="{{url('css/quizflex.css')}}">
    <link rel="stylesheet" href="{{url('css/quiz.css')}}">
    <link rel="stylesheet" href="{{url('css/body.css')}}">
    <link rel="stylesheet" href="{{url('css/question.css')}}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaijaan+2&family=Source+Sans+3&display=swap" rel="stylesheet">

</head>

<body>
    <div class="show-flex">
        <div class = "flex-element">
            <h3>quiz by {{$quiz['author']}}</h3>
            <img src="{{$quiz['img']}}" alt="">
            <h2>{{$quiz['title']}}</h2>
            <p>{{$quiz['description']}}</p>
        </div>
        <form method="POST" action="/edit/quiz">
            @csrf
            <div class="flex-column">
            <h1>Edit Quiz!!! ccc:</h1>
            <input type="text" name="title" placeholder="new title">
            <input type="text" name="description" placeholder="new description">
            <input type="text" name="image" placeholder="new image link">
            <input type="hidden" name="id" value="{{$quiz['id']}}">
            <button>edit 0_0</button>
            </div>
        </form>
    <div>
</body>
</html>