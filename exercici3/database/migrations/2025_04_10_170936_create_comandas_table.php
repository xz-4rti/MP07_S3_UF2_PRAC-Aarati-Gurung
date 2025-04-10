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
        Schema::create('comandes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuari_id');
            $table->string('producte');
            $table->decimal('quantitat', 8, 2);
            $table->timestamps();
        
            $table->foreign('usuari_id')->references('id')->on('usuaris');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comandas');
    }
};
