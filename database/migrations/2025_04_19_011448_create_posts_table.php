<?php

declare(strict_types=1);

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
        Schema::create('posts', function (Blueprint $blueprint): void {
            $blueprint->uuid('id')->primary();
            $blueprint->foreignUuid('author_id')->constrained(table: 'users', column: 'id')->cascadeOnUpdate()->cascadeOnDelete();
            $blueprint->string('title')->unique();
            $blueprint->text('body');
            $blueprint->enum('status', ['draft', 'scheduled', 'published']);
            $blueprint->timestamp('published_at')->nullable();
            $blueprint->timestamps();
            $blueprint->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
