<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            if (! Schema::hasColumn('products', 'short_description_zh')) {
                $table->text('short_description_zh')->nullable();
            }

            if (! Schema::hasColumn('products', 'description_zh')) {
                $table->longText('description_zh')->nullable();
            }

            if (! Schema::hasColumn('products', 'specification_zh')) {
                $table->longText('specification_zh')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            if (Schema::hasColumn('products', 'short_description_zh')) {
                $table->dropColumn('short_description_zh');
            }

            if (Schema::hasColumn('products', 'description_zh')) {
                $table->dropColumn('description_zh');
            }

            if (Schema::hasColumn('products', 'specification_zh')) {
                $table->dropColumn('specification_zh');
            }
        });
    }
};
