<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('movies', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('title', 255); // Movie Title
            $table->text('synopsis'); // Movie Synopsis
            $table->string('poster')->nullable(); // Poster Image URL
            $table->string('year', 4); // Release Year
            $table->boolean('available')->default(true); // Availability
            $table->foreignId('genre_id')->constrained()->onDelete('cascade'); // Foreign Key to Genres
            $table->timestamps(); // Created At & Updated At
        });
    }

    public function down(): void {
        Schema::dropIfExists('movies');
    }
};

