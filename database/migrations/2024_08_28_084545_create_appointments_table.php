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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('photographer_id')->constrained()->onDelete('cascade');
            $table->date('date');
            $table->time('starttime');
            $table->time('endtime');
            $table->string('location');
            $table->text('message');
            $table->enum('approval', ['approved', 'not approved','reject','confirm'])->default('not approved'); // Set default value
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
