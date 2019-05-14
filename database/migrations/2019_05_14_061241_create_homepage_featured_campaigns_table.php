<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomepageFeaturedCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homepage_featured_campaigns', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('campaign_id')->index();
            $table->timestamps();

             $table->foreign('campaign_id')
                 ->references('id')->on('campaigns')
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
        Schema::table('homepage_featured_campaigns', function (Blueprint $table) {
            $table->dropForeign(['campaign_id']);
        });
        Schema::dropIfExists('homepage_featured_campaigns');
    }
}
