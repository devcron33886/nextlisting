<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('location_id')->nullable();
            $table->foreign('location_id', 'location_fk_6664611')->references('id')->on('locations');
            $table->string('title');
            $table->string('slug')->nullable();
            $table->string('model_year');
            $table->decimal('price', 15, 2);
            $table->integer('seats');
            $table->longText('description');
            $table->string('status')->nullable();
            $table->boolean('approved')->default(0)->nullable();
            $table->string('address');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_6665140')->references('id')->on('teams');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
