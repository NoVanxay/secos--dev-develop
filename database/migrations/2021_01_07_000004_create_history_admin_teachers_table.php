<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryAdminTeachersTable extends Migration
{
    public function up()
    {
        Schema::create('history_admin_teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('fist_name');
            $table->string('last_name');
            $table->string('gender');
            $table->string('eng_name');
            $table->string('eng_last');
            $table->date('date_of_birth');
            $table->string('text');
            $table->string('tribes');
            $table->string('religion');
            $table->date('pabbajja');
            $table->string('identification_card');
            $table->string('province_birth');
            $table->string('district_birth');
            $table->string('village_birth');
            $table->string('current_province');
            $table->string('current_district');
            $table->string('current_village');
            $table->string('temple');
            $table->integer('phone_no_1')->unique();
            $table->integer('phone_no_2')->nullable();
            $table->integer('office_phone')->nullable();
            $table->string('census')->unique();
            $table->date('allow_date')->nullable();
            $table->string('live_at');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
