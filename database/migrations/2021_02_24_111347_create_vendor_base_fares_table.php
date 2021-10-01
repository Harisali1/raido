<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorBaseFaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_base_fares', function (Blueprint $table) {
            $table->id();
            $table->integer('vendor_id');
            $table->integer('vehicle_type_id');
            $table->string('base_fare');
            $table->string('per_km');
            $table->string('per_hours');
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
        Schema::dropIfExists('vendor_base_fares');
    }
}
