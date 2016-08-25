<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialAccountPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_account_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->enum('social_account', ['facebook', 'twitter', 'instagram']);
            $table->integer('social_account_id');
            $table->string('media_id');
            $table->string('image')->nullable();
            $table->string('url')->nullable();
            $table->string('caption')->nullable();
            $table->integer('likes')->nullable();
            $table->integer('comments')->nullable();
            $table->timestamp('created_time')->nullable();
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
//        Schema::table('social_account_posts', function (Blueprint $table) {
//            $table->dropForeign(['user_id']);
//            $table->dropForeign(['account_id']);
//        });
        Schema::drop('social_account_posts');
    }
}
