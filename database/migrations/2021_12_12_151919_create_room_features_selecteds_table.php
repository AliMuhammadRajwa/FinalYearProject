<?php

use App\Models\RoomFeatures;
use App\Models\RoomReservation;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomFeaturesSelectedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_features_selecteds', function (Blueprint $table) {
            $table->id();
            $table->Double('feature_price');
            $table->Double('feature_discount');
            $table->foreignIdFor(RoomReservation::class)->constrained();
            $table->foreignIdFor(RoomFeatures::class)->constrained();
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
        Schema::dropIfExists('room_features_selecteds');
    }
}
