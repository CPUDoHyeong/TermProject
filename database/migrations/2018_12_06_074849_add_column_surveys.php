<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnSurveys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('surveys', function (Blueprint $table) {
            // 설문종료, boolean 타입으로 종료가 됐는지 안됐는지만 구분한다.
            // 기본값은 true(진행 중 or 예정)
            $table->boolean('ongoing')->default(true);
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
