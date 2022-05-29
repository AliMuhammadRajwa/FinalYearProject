<?php

use App\Models\Room;
use App\Models\Hotel;
use App\Models\Client;
use App\Models\RoomType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_reservations', function (Blueprint $table) {
            $table->id();
            $table->DateTime('check_in_date_time');
            $table->DateTime('check_out_date_time');
            $table->integer('no_of_adults');
            $table->integer('no_of_childs');
            $table->integer('no_of_rooms');
            $table->string('description')->nullable();
            $table->boolean('status')->default(true);
            $table->foreignIdFor(Hotel::class)->constrained();
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
        Schema::dropIfExists('room_reservations');
    }
}
