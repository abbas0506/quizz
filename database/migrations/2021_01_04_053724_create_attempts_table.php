<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttemptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attempts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('studentId');
            $table->unsignedInteger('quizId'); //gives level id as well
            $table->unsignedInteger('marks');
            $table->unique(['studentId','quizId']); //student can't attempt same quiz more than once
            
            $table->foreign('quizId')
                ->references('id')
                ->on('quizzes')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            
            $table->foreign('studentId')
                ->references('id')
                ->on('students')
                ->onUpdate('cascade')
                ->onDelete('cascade');

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
        Schema::dropIfExists('attempts');
    }
}
