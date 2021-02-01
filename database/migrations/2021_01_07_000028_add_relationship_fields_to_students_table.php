<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToStudentsTable extends Migration
{
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->unsignedBigInteger('classroom_id');
            $table->foreign('classroom_id', 'classroom_fk_2911365')->references('id')->on('class_rooms');
            $table->unsignedBigInteger('school_id');
            $table->foreign('school_id', 'school_fk_2911366')->references('id')->on('schools');
            $table->unsignedBigInteger('academic_years_id');
            $table->foreign('academic_years_id', 'academic_years_fk_2911397')->references('id')->on('academic_years');
            $table->unsignedBigInteger('roles_id');
            $table->foreign('roles_id', 'roles_fk_2911403')->references('id')->on('roles');
        });
    }
}
