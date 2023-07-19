<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depensecontrusctions', function (Blueprint $table) {
            $table->id();
            $table->string('designationdepense');
            $table->double('montantdepense')->default('0.0');
            $table->unsignedBigInteger('projetcontrustion_id');
            $table->foreign('projetcontrustion_id')->references('id')->on('projetcontrustions')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('depensecontrusctions');
    }
};
