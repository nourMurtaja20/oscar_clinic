<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->foreign(['doctorID'])->references(['id'])->on('doctors');
            $table->foreign(['serviceID'])->references(['id'])->on('services');
            $table->foreign(['patientID'])->references(['id'])->on('patients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->dropForeign('appointments_doctorid_foreign');
            $table->dropForeign('appointments_serviceid_foreign');
            $table->dropForeign('appointments_patientid_foreign');
        });
    }
}
