<?php

use Illuminate\Database\Seeder;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 20개의 task를 4개의 project와 연결
        for($i = 0; $i < 20; $i++) {
            DB::table('tasks')->insert([
                'project_id' => rand(1,4),
                'name' => 'Task ' .$i,
                'description' => 'Task ' .$i,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }
    }
}
