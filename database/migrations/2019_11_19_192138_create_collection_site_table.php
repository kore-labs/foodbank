<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectionSiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collection_site', function (Blueprint $table) {

          $table->string('id');

          $table->bigInteger('primaryCollectorId');

          $table->bigInteger('previousCollectorId');

          //start-date and end-date,
          $table->dateTime('last_collection_date_time');

          $table->string('scheduled_collection_day');
          $table->time('scheduled_collection_time');


          $table->string('contact_name');
          $table->string('email');

          $table->string('business_type');
          $table->string('business_name');

          $table->string('business_address');
          $table->string('city');
          $table->string('state');

          $table->string('phone');
          $table->unsignedInteger('zip');

          $table->decimal('latitude', 11, 8);
          $table->decimal('longitude', 11, 8);


          $table->bigInteger('avg_collection_size_in_kg')->default(0);


          $theStatus = \Config::get('app.account_status');
          $table->enum('status', $theStatus)->default($theStatus[0]);

          $table->primary(['scheduled_collection_day', 'scheduled_collection_time', 'business_address', 'zip', 'business_name'], 'unique_key');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collection_location');
    }
}
