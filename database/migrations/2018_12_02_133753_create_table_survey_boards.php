<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSurveyBoards extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 컬럼추가
        Schema::create('surveys', function (Blueprint $table) {
            $table->increments('survey_id');                // 설문지 코드
            $table->string('thema');                        // 분류 
            $table->text('title');                          // 제목 즉 질문
            $table->timestamp('start_date')->nullable();    // 사용자 입력 시작일
            $table->timestamp('end_date')->nullable();      // 사용자 입력 종료일
            $table->timestamp('regtime')->nullable();       // 등록일
            $table->integer('point')->default(0);           // 포인트
            $table->integer('limit_count');                 // 인원 수 제한
            $table->integer('runnig_count')->default(0);    // 현재 참가수
            $table->string('img_url');                      // 이미지 경로
            $table->integer('item_type');                   // 단일선택 vs 복수선택
            $table->string('item_list');                    // 체크박스의 경우 아이템이 여러개이므로 json 형태로 저장한다.
            $table->string('reg_user');                     // 작성자 이메일
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
        //
        Schema::dropIfExists('helps');
    }
}
