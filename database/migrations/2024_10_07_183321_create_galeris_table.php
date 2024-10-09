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
        Schema::create('galeries', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Name for the gallery
            $table->text('images'); // Location of images
            $table->foreignId('penginapan_id')->nullable()->constrained()->cascadeOnDelete(); // Foreign key to travel_packages
            $table->timestamps();
            $table->string('image_path')->nullable(); // Menyimpan path gambar

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galeries');
    }
};
