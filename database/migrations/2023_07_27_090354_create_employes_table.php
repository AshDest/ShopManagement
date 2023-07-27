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
        Schema::create('employes', function (Blueprint $table) {
            $table->id(); // Clé primaire auto-incrémentée
            $table->string('nomcomplet');
            $table->string('fonction');
            $table->string('numero_telephone')->nullable();
            $table->string('adresse_email')->nullable();
            $table->date('date_embauche');
            $table->decimal('salaire', 8, 2);
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
        Schema::dropIfExists('employes');
    }
};
