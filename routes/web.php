<?php

use Illuminate\Support\Facades\Route;

Route::name('news.')->group(function () {
    Route::livewire('/posts', 'news::PostIndex')->name('post.index');
});
