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
                actingAs(UserFactory::new()->create());
            });

            it('renders the form', function () {
                livewire(CreatePost::class)
                    ->assertOk()
                    ->assertFormExists();
            });

            it('creates a Post', function () {
                $post = Post::factory()->make()->except('status');

                livewire(CreatePost::class)
                    ->fillForm($post)
                    ->call('create')
                    ->assertHasNoFormErrors()
                    ->assertRedirect();

                assertDatabaseHas(Post::class, $post);
            });
        });
    });
});
