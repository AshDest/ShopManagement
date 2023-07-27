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
        Schema::create('equipements', function (Blueprint $table) {
            $table->id(); // Clé primaire auto-incrémentée
            $table->string('nom');
            $table->text('description')->nullable();
            $table->date('date_achat')->nullable();
            $table->string('fournisseur')->nullable();
            $table->date('date_maintenance_recente')->nullable();
            $table->string('frequence_maintenance_recommandee')->nullable();
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
        Schema::dropIfExists('equipements');
    }
};
