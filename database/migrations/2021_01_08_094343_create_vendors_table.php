<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->integer('admin_id')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('mobile');
            $table->string('password');
            $table->string('cnic');
            $table->string('image');
            $table->boolean('status')->default(1);
            $table->decimal('latitude', 11, 7)->nullable();
            $table->decimal('longitude', 11, 7)->nullable();
            $table->text('address');
            $table->string('range')->nullable();
            $table->text('device_token')->nullable();
            $table->string('referral_code')->nullable();
            $table->string('vendor_referral_code')->nullable();
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
        Schema::dropIfExists('vendors');
    }
}
