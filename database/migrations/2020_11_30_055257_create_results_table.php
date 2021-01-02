<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('studentId');
            $table->unsignedInteger('quizId'); //gives level id as well
            $table->unsignedInteger('marks');
            
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
        Schema::dropIfExists('results');
    }
}
