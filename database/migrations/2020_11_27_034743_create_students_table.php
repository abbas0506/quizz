<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('userId');
            $table->unsignedInteger('levelId');
            $table->unsignedInteger('semesterNo');
            $table->unsignedInteger('rollNo');

            $table->foreign('userId')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('levelId')
                ->references('id')
                ->on('levels')
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
        Schema::dropIfExists('students');
    }
}
