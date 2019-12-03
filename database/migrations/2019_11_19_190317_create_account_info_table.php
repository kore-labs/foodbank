<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_info', function (Blueprint $table) {

            $table->bigInteger('id');

            $table->string('contact_name');
            $table->string('email')->unique();

            $table->string('account_type');

            $table->string('business_name');

            $table->string('business_address');
            $table->string('city');
            $table->string('state');

            $table->string('phone');
            $table->unsignedInteger('zip');


            $table->smallInteger('number_of_trucks')->default(0);
            $table->bigInteger('hauling_capacity_in_kg')->default(0);


            $theStatus = \Config::get('app.account_status');
            $table->enum('status', $theStatus)->default($theStatus[0]);



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
        Schema::dropIfExists('user_info');
    }
}
