<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index();
            $table->integer('category_id');
            $table->integer('cap')->nullable();
            $table->integer('daily_cap');
            $table->enum('active', ['yes', 'no'])->default('yes');
            $table->enum('private', ['yes', 'no'])->default('no');
            $table->enum('incent', ['yes', 'no'])->default('no');
            $table->enum('mobile', ['yes', 'no'])->default('no');
            $table->string('name');
            $table->longText('description');
            $table->longText('requirements');
            $table->decimal('rate',14,2);
            $table->decimal('network_rate',14,2);
            $table->string('cap_url')->nullable();
            $table->longText('tracking');
            $table->string('url');
            $table->integer('network_id');
            $table->boolean('is_for_snapaid')->default(false);
            $table->string('featured_img')->nullable();
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
        Schema::drop('campaigns');
    }
}
