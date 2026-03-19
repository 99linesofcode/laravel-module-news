<?php

declare(strict_types=1);

namespace Lines\News\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Lines\Auth\Domain\Models\User;
use Lines\News\Domain\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (app()->environment('testing')) {
            User::factory()->create([
                'password' => Hash::make('pass1234'),
            ]);

            Post::factory()->count(5)->create();
            Post::factory()->scheduled()->count(5)->create();
            Post::factory()->published()->count(5)->create();
        }
    }
}
