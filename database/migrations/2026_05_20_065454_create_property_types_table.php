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
        Schema::create('property_types', function (Blueprint $table) {

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | TYPE NAME
            |--------------------------------------------------------------------------
            */

            $table->string('name');

            /*
            |--------------------------------------------------------------------------
            | STATUS
            |--------------------------------------------------------------------------
            */

            $table->boolean('status')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse migrations.
     */

    public function down(): void
    {
        Schema::dropIfExists('property_types');
    }
};