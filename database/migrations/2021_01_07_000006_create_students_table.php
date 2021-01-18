<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('st_code')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender');
            $table->date('date_of_birth');
            $table->string('village');
            $table->string('district');
            $table->string('province');
            $table->string('father_name');
            $table->integer('father_no')->nullable();
            $table->string('mother_name');
            $table->integer('mother_no')->nullable();
            $table->string('end_from');
            $table->integer('phone_no')->nullable();
            $table->string('note')->nullable();
            $table->string('password');
            $table->string('remember_token')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
