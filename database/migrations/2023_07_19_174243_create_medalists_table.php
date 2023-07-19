<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedalistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medalists', function (Blueprint $table) {
            $table->id();
            $table->text("full_name")->nullable();
            $table->date("birthday")->nullable();
            $table->integer("weight")->nullable();
            $table->json("competitions")->nullable();
            $table->integer("total_score")->nullable();
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
        Schema::dropIfExists('medalists');
    }
}
