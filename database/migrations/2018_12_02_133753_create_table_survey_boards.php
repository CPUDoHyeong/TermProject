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
        Schema::create('survey', function (Blueprint $table) {
            $table->increments('survey_id');
            $table->string('thema')->nullable();
            $table->text('title');
            $table->timestamp('start_date');
            $table->timestamp('end_date');
            $table->timestamp('regtime');
            $table->integer('point')->default(0);
            $table->integer('limit_count')->nullable();
            $table->integer('runnig_count')->default(0);
            $table->string('img_url')->nullable();
            $table->integet('item_type')->nullabel();
            $table->string('reg_user')->nullable();
            
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
