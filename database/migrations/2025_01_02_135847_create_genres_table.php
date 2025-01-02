<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('genres', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('name', 255); // Genre Name
            $table->timestamps(); // Created At & Updated At
        });
    }

    public function down(): void {
        Schema::dropIfExists('genres');
    }
};
