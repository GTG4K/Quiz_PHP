<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{url('css/quizflex.css')}}">
    <link rel="stylesheet" href="{{url('css/quiz.css')}}">
    <link rel="stylesheet" href="{{url('css/body.css')}}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaijaan+2&family=Source+Sans+3&display=swap" rel="stylesheet">

    <title>Document</title>
</head>

<body class="container">
    <div class="quiz-flex">
    <form method="POST" action="/new/quiz">
        @csrf
        <div class="flex-column">
        <h1>Add Your Quiz!!! :>>>></h1>
        <input type="text" name="title" placeholder="Title">
        <input type="text" name="img" placeholder="Image">
        <input type="text" name="author" placeholder="author">
        <input type="text" name="description" placeholder="description">
        <button>Add Question :3</button>
        </div>
    </form>
    </div>

    <div class="quiz-flex">
    @for ($i=0; $i < $quizlist->count(); $i++)
    <div class = "flex-element">
        <h3>quiz by {{$quizlist[$i]['author']}}</h3>
        <img src={{$quizlist[$i]['img']}} alt="">
        <h2>{{$quizlist[$i]['title']}}</h2>
        <h2>score achieved: {{$quizlist[$i]['score']}} / {{$questions[$i]}}</h2>
        <h2>Questions: {{$questions[$i]}}</h2>
        <p>{{$quizlist[$i]['description']}}</p>
        <a href="/quiz/{{$quizlist[$i]['id']}}">Continue</a>
        <a style ='margin-top: 10px;' href="/edit/quiz/{{$quizlist[$i]['id']}}">Edit</a>
        <form class = 'block' method="POST" action="/delete/quiz">
            @csrf
            <button class="button"> Delete </button>
            <input type="hidden" name="id" value="{{$quizlist[$i]['id']}}">
        </form>
    </div>
    @endfor
    </div>
</body>
</html>