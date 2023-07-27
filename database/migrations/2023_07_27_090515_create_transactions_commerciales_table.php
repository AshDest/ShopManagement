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
        Schema::create('transactions_commerciales', function (Blueprint $table) {
            $table->id(); // Clé primaire auto-incrémentée
            $table->date('date_transaction');
            $table->string('type_transaction');
            $table->unsignedBigInteger('animal_id')->nullable();
            $table->decimal('montant_transaction', 10, 2);
            $table->string('informations_acheteur_vendeur')->nullable();
            $table->foreign('animal_id')->references('id')->on('animaux')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('transactions_commerciales');
    }
};
