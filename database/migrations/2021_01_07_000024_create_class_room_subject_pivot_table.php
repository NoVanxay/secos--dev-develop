<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassRoomSubjectPivotTable extends Migration
{
    public function up()
    {
        Schema::create('class_room_subject', function (Blueprint $table) {
            $table->unsignedBigInteger('subject_id');
            $table->foreign('subject_id', 'subject_id_fk_2911246')->references('id')->on('subjects')->onDelete('cascade');
            $table->unsignedBigInteger('class_room_id');
            $table->foreign('class_room_id', 'class_room_id_fk_2911246')->references('id')->on('class_rooms')->onDelete('cascade');
        });
    }
}
