<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('DataOfBirth')->nullable();
            $table->string('addres')->nullable();
            $table->string('phone', 10)->nullable();
            $table->unsignedBigInteger('user_id')->nullable()->index('patients_user_id_foreign');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('gender')->nullable();
            $table->string('chronicDiseases')->default('سليم');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
