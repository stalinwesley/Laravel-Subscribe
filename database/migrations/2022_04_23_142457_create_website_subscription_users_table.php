<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website_subscription_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('website_list_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('website_list_id')->references('id')->on('website_list');
            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('website_subscription_users');
    }
};
