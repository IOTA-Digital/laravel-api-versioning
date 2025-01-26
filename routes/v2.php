<?php

use Illuminate\Support\Facades\Route;

Route::any('version', function () {
    return [
        'version' => 'v2',
    ];
});
