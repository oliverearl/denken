<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('news_sources', function (Blueprint $table): void {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('bias')->index();
            $table->string('domain')->unique();
            $table->string('country')->index();
            $table->string('language')->index();
            $table->string('homepage');
            $table->boolean('is_active')->default(false)->index();
            $table->boolean('is_verified')->default(false)->index();
            $table->boolean('is_banned')->default(false)->index();
            $table->timestamp('last_reviewed_at')->nullable();
            $table->json('meta')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news_sources');
    }
};
