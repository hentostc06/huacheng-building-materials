<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('company_projects')) {
            Schema::create('company_projects', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('title_zh')->nullable();
                $table->text('description')->nullable();
                $table->text('description_zh')->nullable();
                $table->string('location')->nullable();
                $table->string('image')->nullable();
                $table->boolean('is_active')->default(true);
                $table->unsignedInteger('sort_order')->default(0);
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('content_playlists')) {
            Schema::create('content_playlists', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('title_zh')->nullable();
                $table->string('platform')->nullable();
                $table->string('url');
                $table->string('thumbnail')->nullable();
                $table->text('description')->nullable();
                $table->text('description_zh')->nullable();
                $table->boolean('is_active')->default(true);
                $table->unsignedInteger('sort_order')->default(0);
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('blog_posts')) {
            Schema::create('blog_posts', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('title_zh')->nullable();
                $table->string('slug')->unique();
                $table->text('excerpt')->nullable();
                $table->text('excerpt_zh')->nullable();
                $table->longText('content')->nullable();
                $table->longText('content_zh')->nullable();
                $table->string('cover_image')->nullable();
                $table->boolean('is_active')->default(true);
                $table->timestamp('published_at')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('blog_posts');
        Schema::dropIfExists('content_playlists');
        Schema::dropIfExists('company_projects');
    }
};
