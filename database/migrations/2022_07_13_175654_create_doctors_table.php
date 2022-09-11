<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('UserId')->nullable()->unique('UserId');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('specialization')->default(0);
            $table->string('TimeForWork')->nullable()->default('Full Stack');
            $table->string('addres')->nullable();
            $table->string('imgUrl')->nullable();
            $table->integer('gender')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}
