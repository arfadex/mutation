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
        Schema::create('detail_demandes', function (Blueprint $table) {
            $table->unsignedInteger('idDemande');
            $table->unsignedInteger('idLycee');
            $table->integer('numOrdre');
            $table->primary(['idDemande', 'idLycee']);
            $table->foreign('idDemande')->references('idDemande')->on('demandes');
            $table->foreign('idLycee')->references('idLycee')->on('lycees');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_demandes');
    }
};
