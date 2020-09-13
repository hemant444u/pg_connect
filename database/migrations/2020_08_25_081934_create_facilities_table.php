<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facilities', function (Blueprint $table) {
            $table->id();
            $table->integer('building_id');
            $table->string('bed_type')->nullable();
            $table->string('cooling')->nullable();
            $table->string('water_purifier')->nullable();
            $table->string('electricity')->nullable();
            $table->string('wifi')->nullable();
            $table->string('cc_tv')->nullable();
            $table->string('kitchen_with_gas')->nullable();
            $table->string('parking')->nullable();
            $table->string('security_guard')->nullable();
            $table->string('water_supply')->nullable();
            $table->string('bathroom')->nullable();
            $table->string('washing_machine')->nullable();
            $table->string('teresh')->nullable();
            $table->string('metress')->nullable();
            $table->string('chair_table')->nullable();
            $table->string('wordrobe')->nullable();
            $table->time('gate_closing')->nullable();
            $table->time('gate_opening')->nullable();
            $table->string('furnished')->nullable();
            $table->string('food')->nullable();
            $table->string('breakfast')->nullable();
            $table->string('lunch')->nullable();
            $table->string('dinner')->nullable();
            $table->string('food_type')->nullable();
            $table->string('food_on_sunday')->nullable();
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
        Schema::dropIfExists('facilities');
    }
}
