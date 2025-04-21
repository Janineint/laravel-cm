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
        Schema::create('artworks', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key 'id'
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('image_url')->nullable(); // Or use text/longtext if URLs are very long
            $table->foreignId('artist_id')->nullable()->constrained()->onDelete('set null'); // Foreign key relationship
            // Add other fields like medium, dimensions, creation_date etc. if needed
            // $table->string('medium')->nullable();
            // $table->string('dimensions')->nullable();
            // $table->year('creation_year')->nullable();
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artworks');
    }
};