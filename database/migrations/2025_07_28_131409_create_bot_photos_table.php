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
        Schema::create('bot_photos', function (Blueprint $table) {
            $table->id();
            $table->string('category'); // например: lashes, tone, color
            $table->string('image_path'); // путь до файла
            $table->boolean('is_active')->default(true); // показывать или нет
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bot_photos');
    }
};
