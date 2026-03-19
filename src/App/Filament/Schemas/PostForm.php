<?php

namespace Lines\News\App\Filament\Schemas;

use Carbon\CarbonImmutable;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Lines\News\Domain\Models\Post;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->components([
                    self::title(),
                    self::body(),
                ])
                    ->columnSpan(3)
                    ->columnOrder([
                        'default' => 2,
                        'lg' => 1,
                    ]),
                Section::make()->components([
                    self::shouldPublish(),
                    self::published(),
                ])
                    ->columnSpan(1)
                    ->columnOrder([
                        'default' => 1,
                        'lg' => 2,
                    ]),
            ]);
    }

    private static function title(): TextInput
    {
        return TextInput::make('title')
            ->autofocus()
            ->autocapitalize()
            ->inputMode('text')
            ->label('Title')
            ->minLength(8)
            ->maxLength(128)
            ->placeholder(ucwords(fake()->realTextBetween(8, 64)))
            ->required()
            ->trim();
    }

    private static function body(): MarkdownEditor
    {
        return MarkdownEditor::make('body')
            ->label('Content')
            ->placeholder(fake()->realText(256))
            ->required();
    }

    private static function shouldPublish(): Toggle
    {
        return Toggle::make('should_publish')
            ->afterStateHydrated(function (Toggle $component, ?Post $record) {
                $component->state(! is_null($record?->published_at));
            })
            ->afterStateUpdated(function (Set $set, bool $state, ?Post $record) {
                $set('published_at', $state ? ($record?->published_at ?? now()) : null);
            })
            ->label(fn (Get $get) => self::resolveShouldPublishLabel($get('published_at')))
            ->live()
            ->saved(false);
    }

    private static function resolveShouldPublishLabel(?string $publishedAt): string
    {
        $date = CarbonImmutable::parse($publishedAt);

        return match (true) {
            is_null($publishedAt) => 'Publish',
            $date->isPast() => 'Published',
            $date->isFuture() => 'Scheduled',
        };
    }

    private static function published(): DatePicker
    {
        return DatePicker::make('published_at')
            ->afterStateHydrated(function (DatePicker $component, ?Post $record) {
                $component->state($record?->published_at);
            })
            ->closeOnDateSelection()
            ->displayFormat('d-m-Y')
            ->label(fn (?string $state) => self::resolvePublishedAtLabel($state))
            ->locale('nl')
            ->live()
            ->native(false)
            ->required(fn (Get $get): bool => $get('should_publish'))
            ->visible(fn (Get $get): bool => $get('should_publish'));
    }

    private static function resolvePublishedAtLabel(?string $publishedAt): string
    {
        $date = CarbonImmutable::parse($publishedAt);

        return match (true) {
            $date->isPast() => 'Published on',
            $date->isFuture() => 'Scheduled for',
        };
    }
}
