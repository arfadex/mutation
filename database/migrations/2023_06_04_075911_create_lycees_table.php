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
        Schema::create('lycees', function (Blueprint $table) {
            $table->increments('idLycee');
            $table->string('nomLycee');
            $table->string('ville');
            $table->unsignedInteger('idAcademie');
            $table->foreign('idAcademie')->references('idAcademie')->on('academies');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lycees');
    }
};
