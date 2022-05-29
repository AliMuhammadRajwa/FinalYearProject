<?php

use App\Models\VehicleType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_details', function (Blueprint $table) {
            $table->id();
            $table->string('vehicle_title');
            $table->string('vehicle_no');
            $table->string('model')->nullable();
            $table->string('color')->nullable();
            $table->string('tracker_no')->unique()->nullable();
            $table->string('condition')->nullable();
            $table->string('description')->nullable();
            $table->foreignIdFor(VehicleType::class)->constrained();
            $table->boolean('isActive')->default(true);
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
        Schema::dropIfExists('vehicle_details');
    }
}
