<?php

declare(strict_types=1);

use Filament\Facades\Filament;
use Lines\Auth\Database\Factories\UserFactory;
use Lines\News\App\Filament\Pages\EditPost;
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

    describe('editing a post', function () {
        describe('as an admin', function () {
            beforeEach(function () {
                actingAs(UserFactory::new()->create());
            });

            it('renders the form', function () {
                $original = Post::factory()->create();

                livewire(EditPost::class, [
                    'record' => $original->id,
                ])
                    ->assertOk()
                    ->assertFormExists();
            });

            it('modifies the existing post', function () {
                $original = Post::factory()->create();
                $modified = Post::factory()->existing($original)->make()->toArray();

                livewire(EditPost::class, [
                    'record' => $original->id,
                ])
                    ->assertSchemaStateSet($original->toArray())
                    ->fillForm($modified)
                    ->call('save')
                    ->assertHasNoFormErrors()
                    ->assertRedirect();

                assertDatabaseHas(Post::class, $modified);
            });
        });
    });
});
