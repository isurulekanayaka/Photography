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
        Schema::create('payments', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->decimal('amount', 10, 2); // Payment amount
            $table->foreignId('appointment_id')->constrained('appointments')->onDelete('cascade'); // Foreign key to appointments
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key to users
            $table->foreignId('photographer_id')->constrained('photographers')->onDelete('cascade'); // Foreign key to photographers
            $table->enum('status', ['advance', 'completed'])->default('advance'); // Enum field for status
            $table->timestamps(); // Created at and updated at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
