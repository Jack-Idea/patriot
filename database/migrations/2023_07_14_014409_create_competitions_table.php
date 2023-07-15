<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();
            $table->text("title")->nullable();
            $table->text("location")->nullable();
            $table->text("category")->nullable();
            $table->text("regulations")->nullable();
            $table->text("legal")->nullable();
            $table->text("report")->nullable();
            $table->text("regulations_link")->nullable();
            $table->text("legal_link")->nullable();
            $table->text("report_link")->nullable();
            $table->date("date_start")->nullable();
            $table->date("date_end")->nullable();
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
        Schema::dropIfExists('competitions');
    }
}
