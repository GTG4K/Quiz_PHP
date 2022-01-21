<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quiz;
use Illuminate\Support\Str;


class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {

        $Images = array(
            "https://i5.walmartimages.com/asr/3a860923-65f2-4ac3-8e43-40a1aa681f44.57825320391c15fb5a8613164754ecd8.png", 
            "https://i5.walmartimages.com/asr/1f26fcac-3629-4783-a493-43d6ffb31290.effb1a8df1bff33038746675dc112ec6.png",
            "https://i5.walmartimages.com/asr/29bf246a-55d7-4dfc-8e01-cdb094eab923.a5822e76987524626a59e56e7151bb13.png",
            "https://i5.walmartimages.com/asr/cdf1e24a-29eb-4590-b0ae-d9a0479a79fe.61281cf6dd4a458ffd104a6764697e66.png?odnHeight=612&odnWidth=612&odnBg=FFFFFF"
        );

    for($i=0; $i<10; $i++){

        $quiz = new Quiz;        

        $quiz->fill([
            'title' => Str::Random(20),
            'description' => Str::Random(60),
            'author' => Str::Random(10)
        ]);

        $img_num = rand(0,3);

        switch ($img_num) {
            case 0:
                $quiz->fill(['img' => "https://i5.walmartimages.com/asr/3a860923-65f2-4ac3-8e43-40a1aa681f44.57825320391c15fb5a8613164754ecd8.png"])->save();
                break;
            case 1:
                $quiz->fill(['img' => "https://i5.walmartimages.com/asr/1f26fcac-3629-4783-a493-43d6ffb31290.effb1a8df1bff33038746675dc112ec6.png"])->save();
                break;
            case 2:
                $quiz->fill(['img' => "https://i5.walmartimages.com/asr/29bf246a-55d7-4dfc-8e01-cdb094eab923.a5822e76987524626a59e56e7151bb13.png"])->save();
                break;
            case 3:
                $quiz->fill(['img' => "https://i5.walmartimages.com/asr/cdf1e24a-29eb-4590-b0ae-d9a0479a79fe.61281cf6dd4a458ffd104a6764697e66.png?odnHeight=612&odnWidth=612&odnBg=FFFFFF"])->save();
                break;
            }
        }

    }
}
