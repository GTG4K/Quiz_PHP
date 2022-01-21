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

    <body class="container">
        <div class="show-flex">
            <div class = "flex-element">
                <h3>quiz by {{$quiz['author']}}</h3>
                <img src="{{$quiz['img']}}" alt="">
                <h2>{{$quiz['title']}}</h2>
                <h2>Questions: {{$questions->count()}}</h2>
                <p>{{$quiz['description']}}</p>
            </div>
        </div>
    
        <form Method="POST" action="/finish/quiz">
            @csrf
            @for ($i = 0; $i < $questions->count(); $i++)
            <div class="quiz-flex">
                <div class = "question_element">
                    <img src="{{$questions[$i]['img']}}" alt="">
                    <div>
                        <h1>Question {{$i+1}}-  {{$questions[$i]['question']}}</h1>
                        @for ($e = 0; $e < 5; $e++)
                            @switch($random_order[$i][$e])
                                @case(1)
                                    <input type="radio" name="answer{{$i}}" value="incorrect">
                                    <label>{{$questions[$i]['answer1']}}</label><br>
                                    @break
                                @case(2) 
                                    <input type="radio" name="answer{{$i}}" value="incorrect">
                                    <label>{{$questions[$i]['answer2']}}</label><br>
                                    @break
                                @case(3)
                                    <input type="radio" name="answer{{$i}}" value="incorrect">
                                    <label>{{$questions[$i]['answer3']}}</label><br>
                                    @break
                                @case(4)
                                    <input type="radio" name="answer{{$i}}" value="incorrect">
                                    <label>{{$questions[$i]['answer4']}}</label><br>
                                    @break
                                @case(5)
                                    <input type="radio" name="answer{{$i}}" value="correct_answer">
                                    <label>{{$questions[$i]['correct_answer']}}</label><br>
                                @break
                            @endswitch
                        @endfor
                    </div>
                </div>
            </div>
            @endfor

            <div class="block">
            <button class="button">Finish Quiz</button>
            <input type="hidden" name="quiz_id" value="{{$quiz['id']}}">
            </div>
        </form>
        
    </body>
</html>