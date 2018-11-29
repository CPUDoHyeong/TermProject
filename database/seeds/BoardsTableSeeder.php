<?php

use Illuminate\Database\Seeder;
use App\Board;
class BoardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        /*
        Board::create([
        	'Title'=>'안녕', 
        	'Writer'=>'일지매',
        	'Content'=>'안녕하세요?',
        ]);
        */
        factory(Board::class, 100)->create();
    }
}
