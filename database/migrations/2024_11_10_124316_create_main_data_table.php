<?php

use App\View\Components\table;
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
        Schema::create('main_data', function (Blueprint $table) {
            $table->id();
            $table->string('website_name');
            $table->text('website_description');
            $table->string('website_phone')->nullable();
            $table->string('website_mail')->nullable();
            $table->string('website_youtube')->nullable();
            $table->string('website_twitter')->nullable();
            $table->string('website_tiktok')->nullable();
            $table->string('website_facebook')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('main_data');
    }
};
