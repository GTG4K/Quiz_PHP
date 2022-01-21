<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;
use Illuminate\Support\Str;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 11; $i++){

            $quiz_id = $i;

            for($o = 1; $o < 11; $o++){
                
                $question = new Question;

                $question->fill([
                    'question' => "question".$o,
                    'img' => "https://c.tenor.com/7Ek4VLQbEasAAAAM/anime-excited.gif",
                    'answer1' => Str::random(10),
                    'answer2' => Str::random(10),
                    'answer3' => Str::random(10),
                    'answer4' => Str::random(10),
                    'correct_answer' => "Correct!!!",
                    'position' => $o,
                    'quiz_id' => $quiz_id
                ])->save();
            }
        }
    }
}
