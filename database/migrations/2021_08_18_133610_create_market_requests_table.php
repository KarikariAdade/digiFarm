<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('market_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('business_id');
            $table->string('title');
            $table->date('due_date');
            $table->string('request_type');
            $table->string('product_type');
            $table->string('quantity');
            $table->string('amount');
            $table->longText('description')->nullable();
            $table->boolean('is_approved')->default(false);
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
        Schema::dropIfExists('market_requests');
    }
}
