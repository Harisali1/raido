<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('mobile');
            $table->string('password');
            $table->string('cnic');
            $table->string('dob')->nullable();
            $table->string('gender');
            $table->string('image')->nullable();
            $table->text('address')->nullable();
            $table->boolean('status')->default(1);
            $table->string('otp')->nullable();
            $table->string('api_token')->nullable();
            $table->text('device_token')->nullable();
            $table->string('platform')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
