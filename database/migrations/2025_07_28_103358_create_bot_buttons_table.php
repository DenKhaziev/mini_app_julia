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
        Schema::create('bot_buttons', function (Blueprint $table) {
            $table->id();
            $table->string('text'); // Текст на кнопке
            $table->enum('type', ['web_app', 'callback_data'])->default('callback_data');
            $table->string('value'); // либо URL, либо callback_data
            $table->string('menu_key')->default('main'); // меню или подменю
            $table->integer('position')->default(0); // порядок сортировки
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bot_buttons');
    }
};
