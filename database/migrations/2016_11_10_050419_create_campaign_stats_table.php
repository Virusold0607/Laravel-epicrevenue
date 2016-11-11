<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_stats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('campaign_id')->index();
            $table->date('date');
            $table->integer('clicks');
            $table->integer('leads');
            $table->decimal('cr', 4);
            $table->timestamps();

            // $table->foreign('campaign_id')
            //     ->references('id')->on('campaigns')
            //     ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('campaign_stats');
    }
}
