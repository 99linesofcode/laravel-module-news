<?php

namespace Lines\News\App\Filament\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Lines\News\Domain\Enums\PostStatus;

class PostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->striped()
            ->columns([
                self::title(),
                self::status(),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ])
            ->stackedOnMobile();
    }

    private static function title(): TextColumn
    {
        return TextColumn::make('title')
            ->grow()
            ->sortable()
            ->words(16)
            ->wrap();
    }

    private static function status(): TextColumn
    {
        return TextColumn::make('status')
            ->badge()
            ->color(fn (PostStatus $state) => match ($state) {
                PostStatus::Draft => 'gray',
                PostStatus::Scheduled => 'warning',
                PostStatus::Published => 'success',
            })
            ->sortable();
    }
}
