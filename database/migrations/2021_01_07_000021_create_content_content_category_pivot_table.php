<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentContentCategoryPivotTable extends Migration
{
    public function up()
    {
        Schema::create('content_content_category', function (Blueprint $table) {
            $table->unsignedBigInteger('content_id');
            $table->foreign('content_id', 'content_id_fk_2912306')->references('id')->on('contents')->onDelete('cascade');
            $table->unsignedBigInteger('content_category_id');
            $table->foreign('content_category_id', 'content_category_id_fk_2912306')->references('id')->on('content_categories')->onDelete('cascade');
        });
    }
}
