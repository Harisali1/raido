<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_types', function (Blueprint $table) {
            $table->id();
            $table->integer('vehicle_category_id')->nullable();
            $table->string('title');
            $table->string('passenger_capacity');
            $table->string('sort_order');
            $table->string('base_fare')->nullable();
            $table->string('base_waiting_time')->nullable();
            $table->string('waiting_time_penalty')->nullable();
            $table->string('image');
            $table->text('description')->nullable();
            $table->text('reason')->nullable();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('vehicle_types');
    }
}
