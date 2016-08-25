<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotion_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('promotion_category', function (Blueprint $table) {
            $table->integer('promotion_id')->index();
            $table->integer('category_id')->index();
            $table->timestamps();
        });
        Schema::create('promotion_influencer', function (Blueprint $table) {
            $table->integer('promotion_id')->index();
            $table->integer('instagram_account_id')->index();
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
        Schema::drop('promotion_category');
        Schema::drop('promotion_influencer');
        Schema::drop('promotion_categories');
    }
}
