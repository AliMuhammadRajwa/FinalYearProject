<?php

use App\Models\City;
use App\Models\Hotel;
use App\Models\Gender;
use App\Models\Country;
use App\Models\Province;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->bigInteger('cnic')->nullable()->unique();
            $table->bigInteger('contact')->unique();
            $table->string('permanent_address');
            $table->string('email')->unique()->nullable();
            $table->boolean('isActive')->default(true);
            $table->string('description')->nullable();
            $table->foreignIdFor(Gender::class)->constrained();
            $table->foreignIdFor(Country::class)->constrained();
            $table->foreignIdFor(Province::class)->constrained();
            $table->foreignIdFor(City::class)->constrained();
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
        Schema::dropIfExists('clients');
    }
}
