<?php

declare(strict_types=1);

use Filament\Facades\Filament;
use Lines\News\App\Filament\Pages\ListPosts;
use Lines\News\Domain\Models\Post;

use function Pest\Livewire\livewire;

describe('PostTable', function () {
    beforeEach(function () {
        Filament::setCurrentPanel(
            Filament::getPanel('admin')
        );
    });

    it('has all the right columns', function () {
        Post::factory()->create();

        livewire(ListPosts::class)
            ->assertTableColumnExists('title')
            ->assertTableColumnExists('status')
            ->assertTableColumnDoesNotExist('body');
    });

    it('can be sorted by title', function () {
        Post::factory()->count(10)->create();

        $sortedPostsAsc = Post::query()->orderBy('title')->get();
        $sortedPostsDesc = Post::query()->orderBy('title', 'desc')->get();

        livewire(ListPosts::class)
            ->sortTable('title')
            ->assertCanSeeTableRecords($sortedPostsAsc, inOrder: true)
            ->sortTable('title', 'desc')
            ->assertCanSeeTableRecords($sortedPostsDesc, inOrder: true);
    });

    it('can be sorted by status', function () {
        Post::factory()->create();
        Post::factory()->scheduled()->create();
        Post::factory()->published()->create();

        $sortedPostsAsc = Post::query()->orderBy('status')->get();
        $sortedPostsDesc = Post::query()->orderBy('status', 'desc')->get();

        livewire(ListPosts::class)
            ->sortTable('status')
            ->assertCanSeeTableRecords($sortedPostsAsc, inOrder: true)
            ->sortTable('status', 'desc')
            ->assertCanSeeTableRecords($sortedPostsDesc, inOrder: true);
    });
});
