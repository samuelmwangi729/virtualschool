<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Owner');
            $table->string('Class');
            $table->string('TimeIn');
            $table->string('TimeOut');
            $table->string('UsualNumber');
            $table->string('PresentNumber');
            $table->string('Subject');
            $table->string('Topic');
            $table->string('Date');
            $table->longText('Objectives');
            $table->longText('Evaluation');
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
        Schema::dropIfExists('lessons');
    }
}
