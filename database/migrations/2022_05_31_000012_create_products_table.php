<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug')->nullable();
            $table->decimal('price', 15, 2);
            $table->longText('description');
            $table->string('status');
            $table->string('approved')->nullable();
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_6665169')->references('id')->on('teams');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
