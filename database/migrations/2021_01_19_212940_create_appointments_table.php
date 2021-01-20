<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('doctor_id');
            $table->unsignedBigInteger('office_id');
            $table->unsignedBigInteger('status_id');
            $table->dateTime('date');
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('doctor_id')->references('id')->on('doctors');
            $table->foreign('office_id')->references('id')->on('offices');
            $table->foreign('status_id')->references('id')->on('statuses');

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
