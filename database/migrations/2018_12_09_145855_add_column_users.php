<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // point 컬럼 추가
        Schema::table('users', function (Blueprint $table) {
            // 설문종료, boolean 타입으로 종료가 됐는지 안됐는지만 구분한다.
            // 기본값은 true(진행 중 or 예정)
            $table->integer('point')->default(0);
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
