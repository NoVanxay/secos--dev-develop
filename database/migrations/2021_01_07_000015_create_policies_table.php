<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoliciesTable extends Migration
{
    public function up()
    {
        Schema::create('policies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('lavel_no');
            $table->date('allow_date');
            $table->longText('description');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
