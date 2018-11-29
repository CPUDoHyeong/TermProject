<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBoards2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('test2', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 50);
            $table->text('content');
            $table->integer('user_id')->unsigned();
            $table->integer('hits')->unsigned() -> default(0);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            // 내가 참조하고 있는 사용자 레코드가 삭제되면 나도 같이 삭제되라
            // 그게 onDlelete('cascade')임
            // update 또한 마찬가지.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
