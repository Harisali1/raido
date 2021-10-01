<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubDriverVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_driver_vehicles', function (Blueprint $table) {
            $table->id();
            $table->integer('user_request_id');
            $table->string('driver_name');
            $table->string('driver_mobile');
            $table->string('vehicle_no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_driver_vehicles');
    }
}
