<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farms', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->string('name')->nullable();
            $table->integer('farm_category_id')->unsigned();
            $table->integer('farm_sub_category_id')->unsigned();
            $table->string('land_size')->nullable();
            $table->string('crop_number')->nullable();
            $table->string('animal_number')->nullable();
            $table->string('address')->nullable();
            $table->longText('description')->nullable();
            $table->string('average_production')->nullable();
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
        Schema::dropIfExists('farms');
    }
}
