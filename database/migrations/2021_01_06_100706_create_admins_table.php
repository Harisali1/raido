<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->boolean('status')->default(1);
            $table->string('contact')->nullable();
            $table->string('hash_key')->nullable();
            $table->timestamps();
        });

        (new \App\Models\Admin([
            'name'     => 'Raido',
            'email'    => 'info@raido.com',
            'password' => bcrypt('raido@123'),
        ]))->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
