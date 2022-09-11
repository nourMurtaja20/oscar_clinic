<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('serviceID')->nullable()->index('appointments_serviceid_foreign');
            $table->unsignedBigInteger('doctorID')->nullable()->index('appointments_doctorid_foreign');
            $table->unsignedBigInteger('patientID')->nullable()->index('appointments_patientid_foreign');
            $table->integer('status')->nullable()->default(0);
            $table->timestamps();
            $table->softDeletes();
            $table->dateTime('start')->unique('start');
            $table->dateTime('end');
            $table->string('title');
            $table->unsignedInteger('NoteID')->default(0);
            $table->string('reson')->nullable();
            $table->text('specialCases')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
