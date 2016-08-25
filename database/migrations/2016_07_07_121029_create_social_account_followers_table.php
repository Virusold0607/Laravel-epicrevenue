<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialAccountFollowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_account_followers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->enum('social_account', ['facebook', 'twitter', 'instagram']);
            $table->integer('social_account_id');
            $table->integer('followed_by');
            $table->integer('follows');
            $table->softDeletes();
            $table->timestamps();

//            $table->foreign('account_id')
//                ->references('id')->on('social_accounts')
//                ->onDelete('cascade');
//            $table->foreign('user_id')
//                ->references('id')->on('users')
//                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::table('social_account_followers', function (Blueprint $table) {
//            $table->dropForeign(['user_id']);
//            $table->dropForeign(['account_id']);
//        });
        Schema::drop('social_account_followers');
    }
}
