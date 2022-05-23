<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhAddressTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('name');
            $table->string('region_id', 10)->index();
        });

        Schema::create('provinces', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('name');
            $table->string('region_id', 10)->index();
            $table->string('province_id', 10)->index();
        });

        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('name');
            $table->string('region_id', 10)->index();
            $table->string('province_id', 10)->index();
            $table->string('city_id', 10)->index();

            $table->index(['province_id', 'region_id'], 'cities_province_regions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cities');
        Schema::drop('provinces');
        Schema::drop('regions');
    }
}
