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
        Schema::create('moderations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('administrator_id')->nullable(); // Ahora es nullable
            $table->unsignedBigInteger('archive_id');
            $table->string('state')->default('pending');
            $table->timestamps();
        
            $table->foreign('administrator_id')->references('id')->on('users')->onDelete('set null'); // Si se elimina el usuario, el campo se establece en null
            $table->foreign('archive_id')->references('id')->on('archives')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moderations');
    }
};
