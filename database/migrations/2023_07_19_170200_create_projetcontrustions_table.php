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
        Schema::create('projetcontrustions', function (Blueprint $table) {
            $table->id();
            $table->string('codeprojet','10')->unique();
            $table->string('designationprojet');
            $table->string('responsableprojet');
            $table->string('contactreponsable');
            $table->enum('statutprojet',['encours','pending','cloturer'])->default('encours');
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
        Schema::dropIfExists('projetcontrustions');
    }
};
