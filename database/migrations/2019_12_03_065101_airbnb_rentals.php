<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AirbnbRentals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('airbnb_rentals', function (Blueprint $table) {
          $table->bigInteger('id');
          $table->smallInteger('beds');
          $table->smallInteger('bathrooms');
          $table->smallInteger('bedrooms');
          $table->smallInteger('persons');

          $table->string('name');
          $table->string('neighborhood');
          $table->string('city');
          $table->string('reviews');
          $table->string('property');
          $table->string('price');
          $table->string('rate_with_service_fee');
          $table->string('rate_type');

          $table->string('min_nights');
          $table->string('amenities');


          $table->date('checkin');
          $table->date('checkout');

          $table->string('property_url');
          $table->decimal('latitude', 11, 8);
          $table->decimal('longitude', 11, 8);
          $table->date('created_at');
          $table->string('hash_id_checkin_today');


          $table->unique('hash_id_checkin_today');




      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
