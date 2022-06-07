<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHousesTable extends Migration
{
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('location_id')->nullable();
            $table->foreign('location_id', 'location_fk_6664576')->references('id')->on('locations');
            $table->string('property_title');
            $table->string('slug')->nullable();
            $table->decimal('price', 15, 2);
            $table->string('area')->nullable();
            $table->integer('bedrooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->string('status')->nullable();
            $table->longText('description');
            $table->string('approved')->nullable();
            $table->string('house_address')->nullable();
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_6665139')->references('id')->on('teams');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
