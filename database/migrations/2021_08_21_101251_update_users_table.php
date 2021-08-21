<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('country')->nullable()->unsigned();
            $table->integer('region')->nullable()->unsigned();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('avatar')->nullable();
            $table->string('description')->nullable();
            $table->string('code', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['country', 'region', 'city', 'address', 'avatar']);
        });
    }
}
