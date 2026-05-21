<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run migrations.
     */

    public function up(): void
    {
        Schema::create('enquiries', function (Blueprint $table) {

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | PROPERTY
            |--------------------------------------------------------------------------
            */

            $table->foreignId('property_id')
                  ->constrained()
                  ->onDelete('cascade');

            /*
            |--------------------------------------------------------------------------
            | USER DETAILS
            |--------------------------------------------------------------------------
            */

            $table->string('name');

            $table->string('mobile');

            $table->string('email');

            $table->longText('message');

            /*
            |--------------------------------------------------------------------------
            | STATUS
            |--------------------------------------------------------------------------
            */

            $table->boolean('status')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse migrations.
     */

    public function down(): void
    {
        Schema::dropIfExists('enquiries');
    }
};