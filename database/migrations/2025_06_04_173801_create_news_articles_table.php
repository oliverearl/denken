<?php

declare(strict_types=1);

use App\Models\NewsSource;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('news_articles', function (Blueprint $table): void {
            $table->id();
            $table->foreignIdFor(NewsSource::class)->constrained()->nullOnDelete();
            $table->string('url')->unique();
            $table->string('canonical_url')->unique()->nullable();
            $table->string('title')->index();
            $table->text('summary');
            $table->text('excerpt')->nullable();
            $table->text('content_hash')->index();
            $table->dateTime('published_at')->nullable();
            $table->string('image_url')->nullable();
            $table->json('keywords')->nullable();
            $table->json('tags')->nullable();
            $table->json('meta')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news_articles');
    }
};
