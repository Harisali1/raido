<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_requests', function (Blueprint $table) {
            $table->id();
            $table->string('booking_id');
            $table->integer('user_id');
            $table->integer('driver_id')->nullable();
            $table->integer('vehicle_type_id');
            $table->enum('status', ['SEARCHING','CANCELED','ACCEPTED','STARTED','ARRIVED','REJECTED','COMPLETED','SCHEDULED'])->default('SEARCHING');
            $table->boolean('canceled')->default(0);
            $table->enum('payment_mode',['CASH', 'CARD'])->default('CASH');
            $table->string('amount')->default(0);
            $table->boolean('paid')->default(0);
            $table->decimal('distance')->nullable();
            $table->decimal('travel_time')->nullable();
            $table->text('start_address')->nullable();
            $table->decimal('start_latitude', 11, 7)->nullable();
            $table->decimal('start_longitude', 11, 7)->nullable();
            $table->text('end_address')->nullable();
            $table->decimal('end_latitude', 11, 7)->nullable();
            $table->decimal('end_longitude', 11, 7)->nullable();
            $table->decimal('track_distance', 11, 7)->nullable();
            $table->decimal('track_latitude', 11, 7)->nullable();
            $table->decimal('track_longitude', 11, 7)->nullable();
            $table->decimal('track_accuracy', 11, 7)->nullable();
            $table->string('penalty')->default(0);
            $table->text('reason')->nullable();
            $table->timestamp('start_at')->nullable();
            $table->timestamp('finished_at')->nullable();
            $table->longText('route_key')->nullable();
            $table->string('booking_date')->nullable();
            $table->string('reached_time')->nullable();
            $table->string('return_time')->nullable();
            $table->string('estimated_price')->nullable();
            $table->string('number_of_passenger')->nullable();
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
        Schema::dropIfExists('user_requests');
    }
}
