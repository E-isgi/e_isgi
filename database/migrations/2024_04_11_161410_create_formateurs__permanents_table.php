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
        Schema::create('formateurs__permanents', function (Blueprint $table) {
            $table->integer('id')->primary();
    $table->date('dateRecrutement');
    $table->date('DateDepartRetraite');
    $table->integer('Echelle');
    $table->string('Echelon', 50);
    $table->string('Grade', 50);
    $table->string('matricule', 50);
    $table->foreign('matricule')->references('matricule')->on('formateurs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formateurs__permanents');
    }
};