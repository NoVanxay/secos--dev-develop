<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassRoomSchoolPivotTable extends Migration
{
    public function up()
    {
        Schema::create('class_room_school', function (Blueprint $table) {
            $table->unsignedInteger('class_room_id');
            $table->foreign('class_room_id', 'class_room_id_fk_2911205')->references('id')->on('class_rooms')->onDelete('cascade');
            $table->unsignedInteger('school_id');
            $table->foreign('school_id', 'school_id_fk_2911205')->references('id')->on('schools')->onDelete('cascade');
        });
    }
}
