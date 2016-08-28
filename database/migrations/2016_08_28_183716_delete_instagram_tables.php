<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteInstagramTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('instagram_accounts');
        Schema::dropIfExists('instagram_account_followers');
        Schema::dropIfExists('instagram_account_posts');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
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
        Schema::create('instagram_account_followers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index();
            $table->integer('instagram_id')->index();
            $table->integer('followed_by');
            $table->integer('follows');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('instagram_account_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index();
            $table->integer('instagram_id')->index();
            $table->string('media_id');
            $table->string('image')->nullable();
            $table->string('url')->nullable();
            $table->string('caption')->nullable();
            $table->integer('likes')->nullable();
            $table->integer('comments')->nullable();
            $table->timestamp('created_time')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }
}
