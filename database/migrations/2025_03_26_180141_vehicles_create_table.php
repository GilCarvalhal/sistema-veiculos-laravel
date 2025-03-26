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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('brand');
            $table->integer('vehicle_year');
            $table->integer('kilometers');
            $table->string('city');
            $table->string('type');
            $table->float('price');
            $table->string('image')->nullable();
            $table->string('description')->nullable();

            $table->string('contact_name');
            $table->string('contact_phone');
            $table->string('contact_mail');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
