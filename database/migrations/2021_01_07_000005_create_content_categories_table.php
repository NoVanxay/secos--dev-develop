<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('content_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('content_category')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
