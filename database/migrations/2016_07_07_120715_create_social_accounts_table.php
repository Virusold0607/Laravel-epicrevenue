<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
//            $table->integer('user_id')->unsigned()->index();
            $table->enum('account', ['facebook', 'twitter', 'instagram']);
            $table->enum('approved', ['yes', 'no'])->default('no');
            $table->integer('account_id')->nullable();
            $table->string('access_token')->nullable();
            $table->string('username')->nullable();
            $table->string('email')->nullable();
            $table->string('name')->nullable();
            $table->boolean('is_verified')->default(0);
            $table->string('profile_picture')->nullable();
            $table->string('bio')->nullable();
            $table->string('website')->nullable();
            $table->integer('followed_by')->nullable();
            $table->integer('follows')->nullable();
            $table->timestamps();
//
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
//        Schema::table('social_accounts', function (Blueprint $table) {
//            $table->dropForeign(['user_id']);
//        });
        Schema::drop('social_accounts');
    }
}
