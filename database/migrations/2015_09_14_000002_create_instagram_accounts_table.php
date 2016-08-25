<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstagramAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instagram_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->enum('approved', ['yes', 'no'])->default('no');
            $table->integer('instagram_id');
            $table->string('access_token');
            $table->string('username');
            $table->string('full_name');
            $table->string('profile_picture')->nullable();
            $table->string('bio')->nullable();
            $table->string('website')->nullable();
            $table->bigInteger('followed_by');
            $table->bigInteger('follows');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('instagram_accounts', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::drop('instagram_accounts');
    }
}
