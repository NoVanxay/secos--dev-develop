<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQaTopicsTable extends Migration
{
    public function up()
    {
        Schema::create('qa_topics', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('subject');
            $table->unsignedInteger('creator_id');
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedInteger('receiver_id');
            $table->foreign('receiver_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }
}
