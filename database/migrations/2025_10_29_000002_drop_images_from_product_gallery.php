<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('product_gallery', 'images')) {
            Schema::table('product_gallery', function (Blueprint $table) {
                $table->dropColumn('images');
            });
        }
    }

    public function down(): void
    {
        if (!Schema::hasColumn('product_gallery', 'images')) {
            Schema::table('product_gallery', function (Blueprint $table) {
                $table->json('images')->nullable();
            });
        }
    }
};


