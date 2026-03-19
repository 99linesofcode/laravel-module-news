<?php

declare(strict_types=1);

use Lines\News\Domain\Enums\PostStatus;

uses(\Lines\News\Tests\TestCase::class);

describe('PostStatus', function () {
    it('returns early when transitioning to the same status', function () {
        PostStatus::Draft->transitionTo(PostStatus::Draft);
    })->throwsNoExceptions();

    describe('Draft', function () {
        it('can transition to Scheduled', function () {
            PostStatus::Draft->transitionTo(PostStatus::Scheduled);
        })->throwsNoExceptions();

        it('can transition to Published', function () {
            PostStatus::Draft->transitionTo(PostStatus::Published);
        })->throwsNoExceptions();

    });

    describe('Scheduled', function () {
        it('can transition to Draft', function () {
            PostStatus::Scheduled->transitionTo(PostStatus::Draft);
        })->throwsNoExceptions();

        it('can transition to Published', function () {
            PostStatus::Scheduled->transitionTo(PostStatus::Published);
        })->throwsNoExceptions();
    });

    describe('Published', function () {
        it('can transition to Draft', function () {
            PostStatus::Scheduled->transitionTo(PostStatus::Draft);
        })->throwsNoExceptions();

        it('can transition to Scheduled', function () {
            PostStatus::Published->transitionTo(PostStatus::Scheduled);
        })->throwsNoExceptions();
    });
});
