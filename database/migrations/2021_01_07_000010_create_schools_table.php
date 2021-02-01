<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolsTable extends Migration
{
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('school')->unique();
            $table->string('village');
            $table->string('district');
            $table->string('province');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
