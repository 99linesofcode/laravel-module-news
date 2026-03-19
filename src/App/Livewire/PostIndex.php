<?php

declare(strict_types=1);

namespace Lines\News\App\Livewire;

use Lines\News\Domain\Enums\PostStatus;
use Lines\News\Domain\Models\Post;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Posts')]
class PostIndex extends Component
{
    public function render()
    {
        return view('news::pages.posts.index', [
            'posts' => Post::query()->whereStatus(PostStatus::Published)->get(),
        ]);
    }
}
