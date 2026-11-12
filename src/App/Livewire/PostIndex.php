<?php

declare(strict_types=1);

namespace Lines\News\App\Livewire;

use Lines\News\Domain\Enums\PostStatus;
use Lines\News\Domain\Models\Post;
use Lines\Support\Core\SharedKernel\Ports\UserDirectoryPort;
use Lines\Support\Core\SharedKernel\ValueObjects\UserId;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Posts')]
class PostIndex extends Component
{
    public function render()
    {
        $posts = Post::query()->whereStatus(PostStatus::Published)->get();

        // News keeps only the author's UserId; the user's details come through the directory.
        $directory = app(UserDirectoryPort::class);
        $authors = $posts
            ->map(fn (Post $post): UserId => $post->author_id)
            ->unique(fn (UserId $id): string => (string) $id)
            ->mapWithKeys(fn (UserId $id): array => [(string) $id => $directory->find($id)]);

        return view('news::pages.posts.index', [
            'posts' => $posts,
            'authors' => $authors,
        ]);
    }
}
