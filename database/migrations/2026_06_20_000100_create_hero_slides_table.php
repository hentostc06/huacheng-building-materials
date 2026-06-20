<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('hero_slides')) {
            Schema::create('hero_slides', function (Blueprint $table) {
                $table->id();
                $table->string('title')->nullable();
                $table->string('title_zh')->nullable();
                $table->text('subtitle')->nullable();
                $table->text('subtitle_zh')->nullable();
                $table->string('badge_text')->nullable();
                $table->string('badge_text_zh')->nullable();
                $table->string('image')->nullable();
                $table->string('button_label')->nullable();
                $table->string('button_url')->nullable();
                $table->unsignedInteger('sort_order')->default(0);
                $table->boolean('is_active')->default(true);
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('hero_slides');
    }
};
