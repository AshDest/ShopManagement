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
            $table->integer('produit_id')->unsigned()->index();
            $table->integer('qte_ajout')->default('0');
            $table->integer('quantite')->default('0');
            $table->text('motif')->nullable();
            $table->foreign('produit_id', 'fk_conversions_produit_id')->references('id')->on('produits');
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
