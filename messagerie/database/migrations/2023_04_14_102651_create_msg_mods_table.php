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
        Schema::create('msg_mods', function (Blueprint $table) {
            $table->id();
            $table->string('Lib_Doc');
            $table->integer('Pages');
            $table->integer('Copies');
            $table->string('NomEtab');
            $table->integer('auteur');
            $table->date('dateEnv');
            $table->integer('NumEnv');
            $table->string('Lib_Serv');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('msg_mods');
    }
};
