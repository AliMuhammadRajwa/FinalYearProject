<?php

use App\Models\User;
use App\Models\City;
use App\Models\Country;
use App\Models\Province;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('hotel_title');
            $table->string('hotel_code');
            $table->string('address');
            $table->bigInteger('contact_no')->unique();
            $table->string('email')->unique();
            $table->string('website_url')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('description')->nullable();
            $table->string('status');
            $table->foreignIdFor(Country::class)->constrained();
            $table->foreignIdFor(Province::class)->constrained();
            $table->foreignIdFor(City::class)->constrained();
            $table->foreignIdFor(User::class)->constrained();
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
        Schema::dropIfExists('hotels');
    }
}
