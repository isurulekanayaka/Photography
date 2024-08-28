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
        Schema::create('photographers', function (Blueprint $table) {
            $table->id(); // Creates an auto-incrementing UNSIGNED BIGINT (primary key) column
            $table->unsignedBigInteger('user_id'); // FK as unsigned big integer
            $table->text('description'); // Column for description
            $table->text('experience'); // Column for experience
            $table->unsignedBigInteger('category_id'); // Column for category
            $table->string('area'); // Column for area
            $table->string('city'); // Column for city
            $table->string('website')->nullable(); // Column for website, nullable
            $table->string('profile_picture')->nullable(); // Column for profile picture, nullable
            $table->string('cover_image')->nullable(); // New column for cover image, nullable
            $table->string('availability')->default('available'); // New column for availability, default to 'available'
            $table->timestamps(); // Creates `created_at` and `updated_at` TIMESTAMP columns
    
            // Setting up foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photographers');
    }
};
