<?php

declare(strict_types=1);

namespace Lines\News\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Lines\News\Domain\Enums\PostStatus;
use Lines\News\Domain\Models\Post;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Lines\News\Domain\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'author_id' => 1,
            'title' => fake()->sentence(),
            'body' => fake()->sentences(asText: true),
            'status' => PostStatus::Draft->value,
            'published_at' => null,
        ];
    }

    /**
     * Simulates updating an existing model.
     */
    public function existing(Model $original): static
    {
        return $this->state(fn () => [
            'id' => $original->id,
        ]);
    }

    /**
     * Indicate that the post is still in draft.
     */
    public function draft(): static
    {
        return $this->state(fn () => [
            'status' => PostStatus::Draft->value,
            'published_at' => null,
        ]);
    }

    /**
     * Indicate that the post is scheduled for some time in the future.
     */
    public function scheduled(): static
    {
        return $this->state(fn () => [
            'status' => PostStatus::Scheduled->value,
            'published_at' => now()->addWeeks(rand(1, 9)),
        ]);
    }

    /**
     * Indicate that the post was published in the past.
     */
    public function published(): static
    {
        return $this->state(fn () => [
            'status' => PostStatus::Published->value,
            'published_at' => now()->subMonth(rand(1, 9)),
        ]);
    }
}
