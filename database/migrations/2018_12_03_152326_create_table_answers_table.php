<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->increments('answer_id');                                        // 답안 코드
            $table->integer('survey_id')->unsigned();                               // 설문지 코드
            $table->foreign('survey_id')->references('survey_id')->on('surveys');   // 설문지 코드 참조
            $table->string('user_answers');                                         // 참여자 답변
            $table->timestamp('submit_date')->nullable();                           // 제출일자
            $table->string('user_email');                                           // 유저 이메일
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_answers');
    }
}
