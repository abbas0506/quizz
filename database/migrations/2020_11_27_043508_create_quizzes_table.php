<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('levelId');
            $table->unsignedInteger('subjectId');
            $table->unsignedInteger('weekNo');
            $table->unsignedInteger('teacherId');

            $table->foreign('levelId')
                ->references('id')
                ->on('levels')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('subjectId')
                ->references('id')
                ->on('subjects')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('teacherId')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('quizzes');
    }
}
