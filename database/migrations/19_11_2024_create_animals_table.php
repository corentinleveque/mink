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
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('age')->nullable();
            $table->enum('type', ['chien', 'cheval', 'brebis', 'cochon'])->nullable(false);
            $table->enum('race', ['labrador', 'frison', 'pottok', 'irishcob', 'merinos', 'solognotes'])->nullable(false);
            $table->mediumText('description')->nullable();
            $table->boolean('isSaled')->default(0);
            $table->integer('prixHt')->default(0);
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
