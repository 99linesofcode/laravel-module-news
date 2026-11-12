<?php

declare(strict_types=1);

use Filament\Facades\Filament;
use Lines\Auth\Database\Factories\UserFactory;
use Lines\News\App\Filament\Pages\CreatePost;
use Lines\News\Domain\Models\Post;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Livewire\livewire;

describe('PostResource', function () {
    beforeEach(function () {
        Filament::setCurrentPanel(
            Filament::getPanel('admin')
        );
    });

    describe('creating a post', function () {
        describe('as an admin', function () {
            beforeEach(function () {
                $this->author = UserFactory::new()->create();
                actingAs($this->author);
            });

            it('renders the form', function () {
                livewire(CreatePost::class)
                    ->assertOk()
                    ->assertFormExists();
            });

            it('creates a Post by the acting user', function () {
                $post = Post::factory()->make()->only(['title', 'body', 'published_at']);

                livewire(CreatePost::class)
                    ->fillForm($post)
                    ->call('create')
                    ->assertHasNoFormErrors()
                    ->assertRedirect();

                assertDatabaseHas(Post::class, [...$post, 'author_id' => $this->author->id]);
            });
        });
    });
});
