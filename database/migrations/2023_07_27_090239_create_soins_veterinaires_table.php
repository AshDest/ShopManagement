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
        Schema::create('soins_veterinaires', function (Blueprint $table) {
            $table->id(); // Clé primaire auto-incrémentée
            $table->unsignedBigInteger('animal_id');
            $table->foreign('animal_id')->references('id')->on('animaux')->onDelete('cascade')->onUpdate('cascade');
            $table->date('date_soin');
            $table->string('type_soin');
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('soins_veterinaires');
    }
};
