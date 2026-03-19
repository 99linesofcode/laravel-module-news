<?php

declare(strict_types=1);

use Filament\Facades\Filament;
use Filament\Forms\Components\Toggle;
use Illuminate\Support\Str;
use Lines\News\App\Filament\Pages\CreatePost;
use Lines\News\App\Filament\Pages\EditPost;
use Lines\News\Domain\Models\Post;

use function Pest\Livewire\livewire;

describe('PostForm', function () {
    beforeEach(function () {
        Filament::setCurrentPanel(
            Filament::getPanel('admin')
        );
    });

    describe('title', function () {
        it('requires title to be between 8 and 128 characters', function () {
            livewire(CreatePost::class)
                ->fillForm([
                    'title' => '',
                ])
                ->call('create')
                ->assertHasFormErrors([
                    'title' => 'required',
                ])
                ->fillForm([
                    'title' => Str::random(7),
                ])
                ->call('create')
                ->assertHasFormErrors([
                    'title' => 'min',
                ])
                ->fillForm([
                    'title' => Str::random(129),
                ])
                ->call('create')
                ->assertHasFormErrors([
                    'title' => 'max',
                ])
                ->fillForm([
                    'title' => fake()->realTextBetween(8, 128),
                ])
                ->call('create')
                ->assertHasNoFormErrors([
                    'title',
                ]);
        });
    });

    describe('body', function () {
        it('is required', function () {
            livewire(CreatePost::class)
                ->fillForm([
                    'body' => '',
                ])
                ->call('create')
                ->assertHasFormErrors([
                    'body' => 'required',
                ]);
        });
    });

    describe('should_publish', function () {
        it('toggles published_at field visibility', function () {
            livewire(CreatePost::class)
                ->fillForm([
                    'should_publish' => false,
                ])
                ->assertSchemaComponentHidden('published_at')
                ->fillForm([
                    'should_publish' => true,
                ])
                ->assertSchemaComponentVisible('published_at');
        });

        it('toggles when published_at is set', function () {
            livewire(CreatePost::class)
                ->fillForm([
                    'should_publish' => false,
                ])
                ->assertSchemaComponentHidden('published_at')
                ->fillForm([
                    'published_at' => now()->toDateString(),
                ])
                ->assertSchemaComponentVisible('should_publish');
        });

        describe('when published_at is unset', function () {
            it('sets the label to "Publish"', function () {
                livewire(CreatePost::class)
                    ->assertFormFieldExists('should_publish', function (Toggle $field) {
                        return $field->getLabel() === 'Publish';
                    });
            });

            it('sets published_at to current date', function () {
                $original = Post::factory()->create();

                livewire(EditPost::class, [
                    'record' => $original->id,
                ])
                    ->assertSchemaStateSet([
                        'should_publish' => false,
                        'published_at' => null,
                    ])
                    ->fillForm([
                        'should_publish' => true,
                    ])
                    ->assertSchemaStateSet([
                        'published_at' => now()->toDateString(),
                    ]);
            });
        });

        describe('when published_at is set', function () {
            describe('and published_at is in the past', function () {
                it('sets the label to "Published"', function () {
                    livewire(CreatePost::class)
                        ->fillForm([
                            'published_at' => now()->subWeek()->toDateString(),
                        ])
                        ->assertFormFieldExists('should_publish', function (Toggle $field) {
                            return $field->getLabel() === 'Published';
                        });
                });
            });

            describe('and published_at is in the future', function () {
                it('sets the label to "Scheduled"', function () {
                    livewire(CreatePost::class)
                        ->fillForm([
                            'published_at' => now()->addWeek()->toDateString(),
                        ])
                        ->assertFormFieldExists('should_publish', function (Toggle $field) {
                            return $field->getLabel() === 'Scheduled';
                        });
                });
            });

        });
    });

    describe('published_at', function () {
        it('is required if should_publish is true', function () {
            livewire(CreatePost::class)
                ->fillForm([
                    'should_publish' => false,
                ])
                ->call('create')
                ->assertHasNoFormErrors([
                    'published_at' => 'required',
                ])
                ->fillForm([
                    'should_publish' => true,
                    'published_at' => '',
                ])
                ->call('create')
                ->assertHasFormErrors([
                    'published_at' => 'required',
                ]);
        });

        it('can be any date, past or future', function () {
            livewire(CreatePost::class)
                ->fillForm([
                    'should_publish' => true,
                    'published_at' => now()->yesterday(),
                ])
                ->call('create')
                ->assertHasNoFormErrors([
                    'published_at' => 'after_or_equal',
                ])
                ->fillForm([
                    'should_publish' => true,
                    'published_at' => now(),
                ])
                ->call('create')
                ->assertHasNoFormErrors([
                    'published_at' => 'after_or_equal',
                ]);
        });

        it('defaults to today', function () {
            $original = Post::factory()->published()->create();
            $published_at = $original->published_at->toDateString();

            expect($published_at)->not()->toEqual(now()->toDateString());

            livewire(EditPost::class, [
                'record' => $original->id,
            ])
                ->assertSchemaStateSet([
                    'should_publish' => true,
                    'published_at' => $published_at,
                ]);
        });
    });
});
