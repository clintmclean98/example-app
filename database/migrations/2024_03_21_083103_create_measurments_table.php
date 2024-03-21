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
        Schema::create('measurements', function (Blueprint $table) {
            $table->id();
            $table->decimal('weight', 8, 2)->nullable(false); // Weight in kilos (required, decimal)
            $table->decimal('fat_percentage', 5, 2)->nullable(); // Fat percentage (decimal)
            $table->string('blood_pressure')->nullable(); // Blood pressure
            $table->unsignedBigInteger('client_id'); // Client (foreign key)
            // Foreign key constraint
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('measurments');
    }
};
