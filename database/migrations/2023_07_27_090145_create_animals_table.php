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
        Schema::create('animals', function (Blueprint $table) {
            $table->id(); // Clé primaire auto-incrémentée
            $table->unsignedBigInteger('enclos_id')->nullable();
            $table->unsignedBigInteger('paturage_id')->nullable();
            $table->string('nom');
            $table->string('espece');
            $table->string('race');
            $table->date('date_naissance');
            $table->string('sexe');
            $table->string('numero_identification')->nullable();
            $table->date('date_deces')->nullable();
            $table->foreign('enclos_id')->references('id')->on('enclos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('paturage_id')->references('id')->on('paturages')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('animals');
    }
};
