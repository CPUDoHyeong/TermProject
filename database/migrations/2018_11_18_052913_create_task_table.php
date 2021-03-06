<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->unsigned();
            // 외래키 지정.
            // 삭제할 때는 dropForeign() 메서드 사용 매개변수로
            // 외래키의 칼럼 이름을 전달해야함.
            $table->foreign('project_id')->references('id')->on('projects');
            $table->string('name', 50);
            $table->text('description')->nullable();
            $table->timestamps();
            $table->timestamp('due_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
