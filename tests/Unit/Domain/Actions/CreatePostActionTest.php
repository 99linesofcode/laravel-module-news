<?php

declare(strict_types=1);

uses(\Lines\News\Tests\TestCase::class);

use Lines\News\Domain\Actions\CreatePostAction;
use Lines\News\Domain\DataTransferObjects\PostData;
use Lines\News\Domain\Models\Post;

use function Pest\Laravel\assertDatabaseHas;

describe('CreatePostAction', function () {
    it('creates a post', function () {
        $post = Post::factory()->make()->except('id');

        (new CreatePostAction)(PostData::fromArray($post));

        assertDatabaseHas(Post::class, $post);
    });
});
