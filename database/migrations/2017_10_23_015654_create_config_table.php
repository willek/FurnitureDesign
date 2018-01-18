<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config', function (Blueprint $table) {
//            settings
            $table->increments('id');
            $table->string('website_name');
            $table->longText('website_description');
            $table->string('maintenance');
            $table->longText('maintenance_message');
//            contact
            $table->string('address');
            $table->string('sub_address');
            $table->string('email');
            $table->string('phone');
//            maps
            $table->string('gmaps');
            $table->string('gmaps_query');
//            images
            $table->string('favicon');
            $table->string('icon');
            $table->string('not_found');
            $table->string('login');
            $table->string('website_image');
//            timestamps
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
        Schema::dropIfExists('config');
    }
}
