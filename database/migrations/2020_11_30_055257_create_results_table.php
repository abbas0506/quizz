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
            $table->string('sname',50);  
            $table->unsignedInteger('quizId'); //gives level id as well
            $table->unsignedInteger('rollNo');
            $table->unsignedInteger('semesterNo');
            
            $table->unsignedInteger('marks');
            $table->unsignedInteger('total');
            $table->foreign('quizId')
                ->references('id')
                ->on('quizzes')
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
