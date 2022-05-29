<?php

use App\Models\City;
use App\Models\Gender;
use App\Models\Country;
use App\Models\Province;
use App\Models\TransportCompanyDetails;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_drivers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->bigInteger('cnic')->unique();
            $table->bigInteger('contact_no')->unique();
            $table->string('email')->unique()->nullable();
            $table->string('address');
            $table->foreignIdFor(TransportCompanyDetails::class)->constrained();
            $table->foreignIdFor(Gender::class)->constrained();
            $table->foreignIdFor(Country::class)->constrained();
            $table->foreignIdFor(Province::class)->constrained();
            $table->foreignIdFor(City::class)->constrained();
            $table->string('status')->default(true);
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
        Schema::dropIfExists('company_drivers');
    }
}
