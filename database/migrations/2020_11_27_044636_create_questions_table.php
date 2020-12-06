<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('quizId');
            $table->string('statement',100);
            $table->string('optionA',50);
            $table->string('optionB',50);
            $table->string('optionC',50);
            $table->string('optionD',50);
            $table->string('ans',1);
            
            $table->foreign('quizId')
                ->references('id')
                ->on('quizzes')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
