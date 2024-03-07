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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('idProfesseur');
            $table->string('nom');
            $table->string('prenom');
            $table->date('dateN');
            $table->date('dateAffLycee');
            $table->string('etatCivil');
            $table->integer('nEnfants');
            $table->integer('points')->nullable();
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->unsignedInteger('idLycee')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->timestamp('email_verified_at')->nullable();
            $table->foreign('idLycee')->references('idLycee')->on('lycees');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
