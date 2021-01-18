<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToContentsTable extends Migration
{
    public function up()
    {
        Schema::table('contents', function (Blueprint $table) {
            $table->unsignedInteger('users_id')->nullable();
            $table->foreign('users_id', 'users_fk_2912295')->references('id')->on('users');
        });
    }
}
