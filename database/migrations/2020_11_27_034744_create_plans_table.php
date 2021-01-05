<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('levelId');
            $table->unsignedInteger('semesterNo');
            $table->unsignedInteger('subjectId');
            $table->unique(['levelId','subjectId']);    //unique key, subject cant repeat at same level
            
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
        Schema::dropIfExists('plans');
    }
}
