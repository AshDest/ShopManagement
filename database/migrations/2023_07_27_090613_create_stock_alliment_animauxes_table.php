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
        Schema::create('stock_alliment_animauxes', function (Blueprint $table) {
            $table->id(); // Clé primaire auto-incrémentée
            $table->string('nom_article');
            $table->text('description')->nullable();
            $table->integer('quantite_en_stock');
            $table->date('date_ajout_stock')->nullable();
            $table->date('date_peremption')->nullable();
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
        Schema::dropIfExists('stock_alliment_animauxes');
    }
};
