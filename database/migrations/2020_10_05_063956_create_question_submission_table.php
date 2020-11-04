<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionSubmissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_submission', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');

            $table->json('choices')->nullable();


            $table->enum('status', ['yes', 'no'])->default('no');
            $table->bigInteger('requested')->unsigned();
            $table->foreign('requested')->references('id')->on('users');
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
        Schema::dropIfExists('question_submission');
    }
}
