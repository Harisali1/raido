<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->integer('vendor_id')->nullable();
            $table->integer('vehicle_id')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('mobile');
            $table->string('password');
            $table->string('license_no')->nullable();
            $table->string('cnic_no');
            $table->string('dob')->nullable();
            $table->string('gender');
            $table->decimal('current_lat', 10, 7)->nullable();
            $table->decimal('current_lng', 10, 7)->nullable();
            $table->enum('availability', ['ONLINE', 'OFFLINE', 'RIDING'])->default('ONLINE')->nullable();
            $table->string('image')->nullable();
            $table->text('address')->nullable();
            $table->string('otp')->nullable();
            $table->string('api_token')->nullable();
            $table->text('device_token')->nullable();
            $table->string('platform')->nullable();
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
        Schema::dropIfExists('drivers');
    }
}
