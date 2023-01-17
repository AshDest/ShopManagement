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
        Schema::create('conversions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produit_id');
            $table->foreign('produit_id')->references('id')->on('produits')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('quantite')->default('0');
            $table->unsignedBigInteger('produit_code');
            $table->foreign('produit_code')->references('id')->on('produits')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('qte_ajout')->default('0');
            $table->text('motif')->nullable();
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
        Schema::dropIfExists('conversions');
    }
};