<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandOrPlotsTable extends Migration
{
    public function up()
    {
        Schema::create('land_or_plots', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('location_id')->nullable();
            $table->foreign('location_id', 'location_fk_6664827')->references('id')->on('locations');
            $table->string('title');
            $table->string('slug')->nullable();
            $table->decimal('price', 15, 2)->nullable();
            $table->string('area');
            $table->longText('description');
            $table->string('approved')->nullable();
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_6665167')->references('id')->on('teams');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
