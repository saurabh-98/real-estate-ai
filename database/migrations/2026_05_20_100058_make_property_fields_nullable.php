<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('properties', function (Blueprint $table) {

            $table->string('state')->nullable()->change();

            $table->string('country')->nullable()->change();

            $table->text('address')->nullable()->change();

            $table->integer('bedrooms')->nullable()->change();

            $table->integer('bathrooms')->nullable()->change();

            $table->integer('garage')->nullable()->change();

            $table->integer('area')->nullable()->change();

        });
    }

    public function down(): void
    {
        //
    }
};