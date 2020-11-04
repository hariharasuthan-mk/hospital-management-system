<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_answers', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->bigInteger('answered')->unsigned();
          $table->foreign('answered')->references('id')->on('users');
          $table->bigInteger('question')->unsigned();
          $table->foreign('question')->references('id')->on('question_submission');
          $table->json('answers')->nullable();
          $table->enum('status', ['publish', 'draft'])->default('draft');
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
        Schema::dropIfExists('question_answers');
    }
}
