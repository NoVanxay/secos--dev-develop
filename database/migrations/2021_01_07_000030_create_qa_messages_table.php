<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQaMessagesTable extends Migration
{
    public function up()
    {
        Schema::create('qa_messages', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('topic_id');
            $table->foreign('topic_id')->references('id')->on('qa_topics')->onDelete('cascade');
            $table->unsignedInteger('sender_id');
            $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamp('read_at')->nullable();
            $table->text('content');
            $table->timestamps();
        });
    }
}
