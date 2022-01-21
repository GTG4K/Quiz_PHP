<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{url('css/quizflex.css')}}">
    <link rel="stylesheet" href="{{url('css/quiz.css')}}">
    <link rel="stylesheet" href="{{url('css/body.css')}}">
    <link rel="stylesheet" href="{{url('css/question.css')}}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaijaan+2&family=Source+Sans+3&display=swap" rel="stylesheet">

    <title>Document</title>
</head>

<body class="container">
    <div class="show-flex">
        <div class = "flex-element">
            <h3>quiz by {{$quiz['author']}}</h3>
            <img src="{{$quiz['img']}}" alt="">
            <h2>{{$quiz['title']}}</h2>
            <h2>score achieved: {{$quiz['score']}} / {{$questions->count()}}</h2>
            <h2>Questions: {{$questions->count()}}</h2>
            <p>{{$quiz['description']}}</p>
            <a href="/take/quiz/{{$quiz['id']}}">take quiz :))))</a>
        </div>
        <form method="POST" action="/new/question">
            @csrf
            <div class="flex-column">
            <h1>Add Question!!! :>>>></h1>
            <input type="text" name="question" placeholder="question">
            <input type="text" name="answer1" placeholder="answer1">
            <input type="text" name="answer2" placeholder="answer2">
            <input type="text" name="answer3" placeholder="answer3">
            <input type="text" name="answer4" placeholder="answer4">
            <input type="text" name="correct_answer" placeholder="correct_answer">
            <input type="text" name="img" placeholder="image">
            <input type="text" name="position" placeholder="priority">
            <input type="hidden" name="quiz_id" value="{{$quiz['id']}}">
            <button>Add Question :3</button>
            </div>
        </form>
    </div>

    @foreach ($questions as $question)
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
            <form class="block2" method="GET" action="/edit/question/{{$question["id"]}}">
                @csrf
                <button class = "button2"> edit </button>
            </form>
            <form class="block2" method="POST" action="/delete/question">
                @csrf
                <button class = "button"> delete </button>
                <input type="hidden" name="question_id" value="{{$question['id']}}">
                <input type="hidden" name="quiz_id" value="{{$quiz['id']}}">
            </form>
        </div>
    @endforeach
    
</body>
</html>