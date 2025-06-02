<?php

declare(strict_types=1);

use App\Models\NewsSource;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('news_source_social_media', function (Blueprint $table): void {
            $table->id();
            $table->foreignIdFor(NewsSource::class)->constrained()->cascadeOnDelete();
            $table->string('facebook')->nullable();
            $table->string('x')->nullable();
            $table->string('instagram')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('threads')->nullable();
            $table->string('bsky')->nullable();
            $table->string('linkedin')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news_source_social_media');
    }
};
