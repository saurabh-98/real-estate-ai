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
        Schema::create('properties', function (Blueprint $table) {

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | PROPERTY TYPE
            |--------------------------------------------------------------------------
            */

            $table->foreignId('property_type_id')
                  ->constrained()
                  ->onDelete('cascade');

            /*
            |--------------------------------------------------------------------------
            | BASIC INFO
            |--------------------------------------------------------------------------
            */

            $table->string('title');

            $table->string('slug')->unique();

            $table->longText('description');

            /*
            |--------------------------------------------------------------------------
            | PRICE
            |--------------------------------------------------------------------------
            */

            $table->decimal('price', 15, 2);

            /*
            |--------------------------------------------------------------------------
            | LOCATION
            |--------------------------------------------------------------------------
            */

            $table->string('city');

            $table->string('state')->nullable();

            $table->string('country')->default('India');

            $table->string('address')->nullable();

            /*
            |--------------------------------------------------------------------------
            | PROPERTY DETAILS
            |--------------------------------------------------------------------------
            */

            $table->integer('bedrooms')->nullable();

            $table->integer('bathrooms')->nullable();

            $table->integer('garage')->nullable();

            $table->string('area')->nullable();

            /*
            |--------------------------------------------------------------------------
            | IMAGE
            |--------------------------------------------------------------------------
            */

            $table->string('featured_image')->nullable();

            /*
            |--------------------------------------------------------------------------
            | AI SEO
            |--------------------------------------------------------------------------
            */

            $table->text('seo_title')->nullable();

            $table->text('seo_description')->nullable();

            $table->text('seo_keywords')->nullable();

            /*
            |--------------------------------------------------------------------------
            | STATUS
            |--------------------------------------------------------------------------
            */

            $table->boolean('is_featured')->default(false);

            $table->boolean('status')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */

    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};