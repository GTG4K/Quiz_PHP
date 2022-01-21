<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Question;

class QuizController extends Controller
{
    public function index(){

        $quizlist = Quiz::all();
        $questions = Question::all();
        $question_counts = [];

        foreach ($quizlist as $quiz) {
            $question_counts[] = $questions->where('quiz_id', $quiz['id'])->count();
        }

        return view('index',['quizlist' => $quizlist,  'questions' => $question_counts]);
    }

    public function show($id){

        $quiz = Quiz::find($id);
        $questions = Question::where('quiz_id', $id)->orderby('position','asc')->get();


        return view('show',['quiz' => $quiz, 'questions' => $questions]);
    }



    //---  take quiz and calculate results!!!



    public function take_quiz($id){

        $quiz = Quiz::find($id);
        $questions = Question::where('quiz_id', $id)->orderby('position','asc')->get();


        $randomized_answers = [];

        for($i = 0; $i < $questions->count(); $i++){
            $nums = [1,2,3,4,5];
            shuffle($nums);
            array_push($randomized_answers, $nums);
        }

        return view('takequiz',['quiz' => $quiz, 'questions' => $questions, 'random_order' => $randomized_answers]);
    }


    public function finish_quiz(Request $request){

        $id = $request['quiz_id'];
        $quiz = Quiz::find($id);
        $questions = Question::where('quiz_id', $id)->orderby('position','asc');

        $achieved_score = 0;

        for($i = 0; $i < $questions->count(); $i++){
            if($request['answer'.$i] == 'correct_answer'){
                $achieved_score++;
            }
        }

        $quiz->fill(['score' => $achieved_score])->save();

        return redirect('/');
    }


    // Add-Delete-Edit Question

    public function new_question(Request $request){

        $question = new Question();

        $question->fill([
            'question' => $request['question'],
            'img' => $request['img'],
            'answer1' => $request['answer1'],
            'answer2' => $request['answer2'],
            'answer3' => $request['answer3'],
            'answer4' => $request['answer4'],
            'correct_answer' => $request['correct_answer'],
            'position' => $request['position'],
            'quiz_id' => $request['quiz_id']
        ])->save();

        return redirect('/quiz/'.$request['quiz_id']);
    }

    public function delete_question(Request $request){

        $question = Question::find($request['question_id']);
        $question->delete();

        return redirect('/quiz/'.$request['quiz_id']);
    }


    public function edit_question($id){

        $question = Question::find($id);

        return view('edit_question',['question'=> $question]);

    }


    public function edit_question_post(Request $request){

        $question = Question::find($request['id']);

        //kitxva/surati
        if($request['question']){
            $question->fill(['question'=>$request['question']])->save();
        }
        if($request['img']){
            $question->fill(['img'=>$request['img']])->save();
        }

        //araswori pasuxebi
        if($request['answer1']){
            $question->fill(['answer1'=>$request['answer1']])->save();
        }
        if($request['answer2']){
            $question->fill(['answer1'=>$request['answer1']])->save();
        }
        if($request['answer3']){
            $question->fill(['answer1'=>$request['answer1']])->save();
        }
        if($request['answer4']){
            $question->fill(['answer1'=>$request['answer1']])->save();
        }

        //swori pasuxi
        if($request['correct_answer']){
            $question->fill(['correct_answer'=>$request['correct_answer']])->save();
        }

        //pozicia
        if($request['position']){
            $question->fill(['correct_answer'=>$request['correct_answer']])->save();
        }

        return redirect('/quiz/'.$question['quiz_id']);
    }

    

    // Add-Delete Quiz

    public function new_quiz(Request $request){

        $quiz = new Quiz();

        $quiz->fill([
            'title' => $request['title'],
            'img' => $request['img'],
            'author' => $request['author'],
            'description' => $request['description'],
        ])->save();

        return redirect('/');
    }

    public function edit_quiz($id){

        $quiz = Quiz::find($id);

        return view('edit_quiz',['quiz'=> $quiz]);

    }

    public function edit_quiz_post(Request $request){

        $quiz = Quiz::find($request['id']);

        if($request['title']){
            $quiz->fill(['title'=>$request['title']])->save();
        }
        if($request['img']){
            $quiz->fill(['img'=>$request['img']])->save();
        }
        if($request['description']){
            $quiz->fill(['description'=>$request['description']])->save();
        }

        return redirect('/');
    }

    public function delete_quiz(Request $request){
        $quiz = Quiz::find($request['id']);
        $quiz->delete();

        return redirect('/');
    }
}
