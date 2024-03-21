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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('first_name'); // First name (required)
            $table->string('last_name'); // Last name (required)
            $table->date('date_of_birth'); // Date of birth (required)
            $table->decimal('length_cm', 8, 2); // Length in centimeters (required)
            $table->string('email')->unique(); // Email address (required and unique)
            $table->string('photo')->nullable(); // Photo (minimum of 200x200 pixels)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
