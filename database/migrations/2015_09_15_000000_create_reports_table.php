<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index();
            $table->integer('campaign_id')->index();
            $table->integer('status')->default(1);
            $table->string('ip');
            $table->string('ref_url')->nullable();
            $table->string('user_agent');
            $table->string('city')->default('unknown');
            $table->string('state')->default('unknown');
            $table->string('country')->default('unknown');
            $table->string('postal')->default('unknown');
            $table->string('credit_hash');
            $table->decimal('rate',14,2);
            $table->decimal('network_rate',14,2)->nullable();
            $table->string('subid1')->nullable();
            $table->string('subid2')->nullable();
            $table->string('subid3')->nullable();
            $table->string('subid4')->nullable();
            $table->string('subid5')->nullable();
            $table->string('postback_url')->nullable();
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
        Schema::drop('reports');
    }
}

