<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            if (!Schema::hasColumn('products', 'image_path')) {
                $table->string('image_path')->nullable()->after('price');
            }
            if (!Schema::hasColumn('products', 'is_published')) {
                $table->boolean('is_published')->default(false)->after('image_path');
            }
            if (!Schema::hasColumn('products', 'slug')) {
                $table->string('slug')->unique()->after('name');
            }
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            if (Schema::hasColumn('products', 'image_path')) {
                $table->dropColumn('image_path');
            }
            if (Schema::hasColumn('products', 'is_published')) {
                $table->dropColumn('is_published');
            }
            if (Schema::hasColumn('products', 'slug')) {
                // If your slug was unique, drop the index first (name may vary by DB)
                $table->dropUnique('products_slug_unique');
                $table->dropColumn('slug');
            }
        });
    }
};