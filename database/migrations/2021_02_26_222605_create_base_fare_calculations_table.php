<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaseFareCalculationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('base_fare_calculations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vendor_base_fare_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('vehicle_type_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('label')->nullable();
            $table->string('base_fare')->nullable();
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
        Schema::dropIfExists('base_fare_calculations');
    }
}
