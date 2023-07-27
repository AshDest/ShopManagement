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
            $table->unsignedBigInteger('produit_code');
            $table->integer('qte_ajout')->default(0);
            $table->integer('quantite')->default(0);
            $table->text('motif')->nullable();
            $table->timestamps();

            $table->foreign('produit_id')->references('id')->on('produits')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('produit_code')->references('id')->on('produits')->onDelete('cascade')->onUpdate('cascade');
        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('conversions', function (Blueprint $table) {
            $table->dropForeign(['produit_id']);
            $table->dropForeign(['produit_code']);
        });

        Schema::dropIfExists('conversions');
    }
};
