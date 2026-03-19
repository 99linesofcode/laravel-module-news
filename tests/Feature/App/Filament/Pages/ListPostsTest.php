<?php

declare(strict_types=1);

use Filament\Facades\Filament;
use Lines\News\App\Filament\Pages\ListPosts;

use function Pest\Livewire\livewire;

describe('PostTable', function () {
    beforeEach(function () {
        Filament::setCurrentPanel(
            Filament::getPanel('admin')
        );
    });

    it('renders', function () {
        livewire(ListPosts::class)
            ->assertSuccessful();
    });
});
