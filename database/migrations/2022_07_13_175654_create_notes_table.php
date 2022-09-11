<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->integer('id', true);
            $table->text('noteText')->nullable()->default('لا يوجد أي ملاحظات ..');
            $table->timestamp('created_at')->useCurrentOnUpdate()->useCurrent();
            $table->softDeletes();
            $table->dateTime('updated_at')->nullable();
            $table->unsignedInteger('appintment_id')->nullable()->index('appointmentID_notes_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes');
    }
}
