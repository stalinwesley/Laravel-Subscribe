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
        Schema::create('website_subscription_users_email', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('website_list_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('post_id');
            $table->boolean('is_sent');
            // $table->foreign(['website_list_id','user_id','post_id'])->references(['id','id','id'])->on(['website_list','users','posts']);
            $table->foreign('website_list_id')->references('id')->on('website_list');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('post_id')->references('id')->on('posts');
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
        Schema::dropIfExists('website_subscription_users_email');
    }
};
