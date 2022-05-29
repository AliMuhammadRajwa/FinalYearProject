<?php

use App\Models\TransportCompanyDetails;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transport_reservations', function (Blueprint $table) {
            $table->id();
            $table->DateTime('from_date_time');
            $table->DateTime('to_date_time');
            $table->foreignIdFor(TransportCompanyDetails::class)->constrained();
            $table->string('status');
            $table->string('description')->nullable();
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
        Schema::dropIfExists('transport_reservations');
    }
}
