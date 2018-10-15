<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSnapMoneysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('snap_moneys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index();
            $table->enum('page_header_type', ['text', 'image'])->default('text');
            $table->string('page_header');
            $table->string('title');
            $table->string('description');
            $table->mediumText('instructions');
            $table->string('login_title');
            $table->string('login_description');
            $table->string('login_background_image');
            $table->string('custom_color');
            $table->boolean('exclude_cpa');
            $table->timestamps();

//             $table->foreign('user_id')
//                 ->references('id')->on('users')
//                 ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::table('snap_moneys', function (Blueprint $table) {
//            $table->dropForeign(['user_id']);
//        });

        Schema::drop('snap_moneys');
    }
}
