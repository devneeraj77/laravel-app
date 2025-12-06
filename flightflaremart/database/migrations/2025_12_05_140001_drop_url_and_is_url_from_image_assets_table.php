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
        Schema::table('image_assets', function (Blueprint $table) {
            $table->dropColumn(['url', 'is_url']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('image_assets', function (Blueprint $table) {
            $table->string('url')->nullable();
            $table->boolean('is_url')->default(false);
        });
    }
};