<?php

use App\Models\Client;
use App\Models\RoomReservation;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomReservationPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_reservation_payments', function (Blueprint $table) {
            $table->id();
            $table->Double('total_amount');
            $table->Double('other_amount')->default(0);
            $table->Double('total_discount')->default(0);
            $table->Double('amount_due');
            $table->Double('paid_amount');
            $table->Double('amount_credit');
            $table->string('description')->nullable();
            $table->foreignIdFor(RoomReservation::class)->constrained();
            $table->foreignIdFor(Client::class)->constrained();
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
        Schema::dropIfExists('room_reservation_payments');
    }
}
