<?php

use Illuminate\Database\Seeder;
use App\Help;
class HelpTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 그냥 넣기
        Help::create(
            [
            'writer'=>'master@master.com',
            'title'=>'공지사항4',
            'content'=>'공지사항4',
            ]
        );


        // 반복문 이용해서 넣기.
        for($i = 5; $i <=20; $i++) {
            DB::table('helps')->insert([
                'writer'=>'master@master.com',
                'title'=>'공지사항'.$i,
                'content'=>'공지사항'.$i,
            ]);
        }
    }
}
