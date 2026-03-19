<?php

namespace Lines\News\App\Filament\Pages;

use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Lines\News\App\Filament\Resources\PostResource;
use Lines\News\Domain\Actions\CreatePostAction;
use Lines\News\Domain\DataTransferObjects\PostData;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function handleRecordCreation(array $data): Model
    {
        return app(CreatePostAction::class)(PostData::fromArray([
            ...$data,
            'author_id' => auth()->user()->id,
        ]));
    }
}
