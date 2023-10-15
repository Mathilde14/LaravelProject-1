<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('niveauxes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->string('libelle');
            $table->integer('scolarite');
            $table->unsignedBigInteger('annee_id');
            $table->foreign('annee_id')->references('id')->on('annee_scolaires');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('niveauxes');
    }
};
