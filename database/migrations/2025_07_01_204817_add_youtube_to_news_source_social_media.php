<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('news_source_social_media', function (Blueprint $table): void {
            $table->string('youtube')->after('linkedin')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('news_source_social_media', function (Blueprint $table): void {
            $table->dropColumn(['youtube']);
        });
    }
};
