<?php

declare(strict_types=1);

use App\Models\NewsArticle;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('news_posts', function (Blueprint $table): void {
            $table->uuid('id')->primary();
            $table->string('content');
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(NewsArticle::class)->constrained()->nullOnDelete();
            $table->boolean('is_limited')->index();
            $table->boolean('is_hidden')->index();
            $table->boolean('is_pinned')->index();
            $table->geometry('geolocation')->nullable();
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
        Schema::dropIfExists('news_posts');
    }
};
