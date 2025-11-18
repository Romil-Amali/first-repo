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
        Schema::create('ai_tools', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->string('logo')->nullable();
            $table->string('url');
            $table->string('api_endpoint')->nullable();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->boolean('is_active')->default(true);
            $table->enum('pricing', ['free', 'freemium', 'paid']);
            $table->json('features')->nullable();
            $table->integer('popularity')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ai_tools');
    }
};
