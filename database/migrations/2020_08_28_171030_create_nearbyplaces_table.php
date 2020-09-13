<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNearbyplacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nearbyplaces', function (Blueprint $table) {
            $table->id();
            $table->integer('building_id');
            $table->string('place');
            $table->string('name');
            $table->string('photo');
            $table->string('video');
            $table->bigInteger('distance');
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
        Schema::dropIfExists('nearbyplaces');
    }
}
