<?php

declare(strict_types=1);

use Lines\Auth\Database\Factories\UserFactory;
use Lines\News\App\Livewire\PostIndex;
use Lines\News\Domain\Models\Post;

use function Pest\Livewire\livewire;

describe('PostIndex', function () {
    it('shows each published post with its author\'s name', function () {
        $author = UserFactory::new()->create(['name' => 'Ada Lovelace']);
        Post::factory()->published()->create(['author_id' => $author->id, 'title' => 'Notes on the Engine']);

        livewire(PostIndex::class)
            ->assertSee('Notes on the Engine')
            ->assertSee('Ada Lovelace');
    });
});
