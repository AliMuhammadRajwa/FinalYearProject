<?php

use App\Models\Hotel;
use App\Models\BedType;
use App\Models\RoomType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_title');
            $table->string('room_no');
            $table->string('room_size');
            $table->double('total_price');
            $table->string('description')->nullable();
            $table->string('status');
            $table->foreignIdFor(RoomType::class)->constrained();
            $table->foreignIdFor(BedType::class)->constrained();
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
        Schema::dropIfExists('rooms');
    }
}
