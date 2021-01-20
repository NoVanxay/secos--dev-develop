<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnoucementsTable extends Migration
{
    public function up()
    {
        Schema::create('annoucements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('number');
            $table->string('short_name');
            $table->date('allow_date');
            $table->longText('description');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
