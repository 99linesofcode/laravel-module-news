<?php

declare(strict_types=1);

use Lines\News\Domain\Actions\CreatePostAction;
use Lines\News\Domain\DataTransferObjects\PostData;
use Lines\News\Domain\Models\Post;
use Lines\News\Tests\TestCase;

use function Pest\Laravel\assertDatabaseHas;

uses(TestCase::class);

describe('CreatePostAction', function () {
    it('creates a post', function () {
        $post = Post::factory()->make()->except('id');

        (new CreatePostAction)(PostData::fromArray($post));

        assertDatabaseHas(Post::class, $post);
    });
});
