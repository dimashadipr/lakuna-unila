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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('cover');
            $table->string('title', length: 255);
            $table->string('slug')->unique();
            $table->mediumText('body_content');
            $table->enum('status', ['DRAFT', 'PUBLISH']);
            $table->enum('category', ['NEWS', 'JOBS', 'AGENDA']);
            $table->foreignId('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
