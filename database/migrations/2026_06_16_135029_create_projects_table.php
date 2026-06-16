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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('image_path')->nullable(); // Path to the project image
            $table->string('category'); // e.g., App, Website, Theme, UI UX
            $table->decimal('price', 8, 2)->default(0.00); // Price of the project
            $table->decimal('rating', 2, 1)->default(0.0); // Rating out of 5
            $table->string('status')->default('free'); // e.g., 'free', 'paid'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};

