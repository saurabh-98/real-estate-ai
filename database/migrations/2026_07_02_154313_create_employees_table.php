<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')
                  ->constrained()
                  ->cascadeOnDelete();

            // --- Basic Information (Tab 1) ---

            $table->string('full_name');

            $table->string('email')->unique();

            $table->string('phone_number');

            $table->date('date_of_birth');

            $table->enum('gender', ['male', 'female', 'other']);

            $table->string('address_line_1');

            $table->string('address_line_2')->nullable();

            $table->string('city');

            $table->string('state');

            $table->string('pincode');

            $table->string('country');

            $table->string('profile_photo')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};