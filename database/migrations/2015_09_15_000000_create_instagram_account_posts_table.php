<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstagramAccountPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('instagram_account_posts');
    }
}
