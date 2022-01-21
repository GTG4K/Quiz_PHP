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
        <form method="POST" action="/edit/question">
            @csrf
            <div class="flex-column">
            <h1>edit Question!!! :>>>></h1>
            <input type="text" name="question" placeholder="question">
            <input type="text" name="answer1" placeholder="answer1">
            <input type="text" name="answer2" placeholder="answer2">
            <input type="text" name="answer3" placeholder="answer3">
            <input type="text" name="answer4" placeholder="answer4">
            <input type="text" name="correct_answer" placeholder="correct_answer">
            <input type="text" name="img" placeholder="image">
            <input type="text" name="position" placeholder="priority">
            <input type="hidden" name="id" value="{{$question['id']}}">

            <button>Edit Question :3</button>
            </div>
        </form>
    </div>

    <div class="quiz-flex">
        <div class = "question_element">
            <img src="{{$question['img']}}" alt="">
            <div>
                <h1>{{$question['question']}}</h1>
                <p>a. {{$question['answer1']}}</p>
                <p>b. {{$question['answer2']}}</p>
                <p>c. {{$question['answer3']}}</p>
                <p>d. {{$question['answer4']}}</p>
                <p>e. {{$question['correct_answer']}}</p>
            </div>
        </div>
</body>
</html>