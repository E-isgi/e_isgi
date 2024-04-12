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
        Schema::create('affecter_realjour_p_r', function (Blueprint $table) {
            $table->id();
            $table->UnsignedBigInteger('idSemaine');
            $table->UnsignedBigInteger('idJour');
            $table->UnsignedBigInteger('idSalle');
            $table->UnsignedInteger('idSeance');
            $table->string('matricule');
            $table->UnsignedBigInteger('idModule');
            $table->string('codeGroupePR');
            $table->decimal('MHRD', 2, 2);

            $table->unique(['idSemaine', 'idJour', 'idSalle', 'idSeance', 'matricule', 'idModule', 'codeGroupePR'], 'unique_affecter_realjour_d_s');

            $table->foreign('idJour')->references('id')->on('jours');
            $table->foreign('matricule')->references('matricule')->on('formateurs');
            $table->foreign('idSeance')->references('ordreSeance')->on('seances');
            $table->foreign('idModule')->references('id')->on('modules');
            $table->foreign('codeGroupePR')->references('codeGroupePR')->on('groupe_presentiels');
            $table->foreign('idSalle')->references('id')->on('salles');
            $table->foreign('idSemaine')->references('id')->on('semaines');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affecter_realjour_p_r');
    }
};
