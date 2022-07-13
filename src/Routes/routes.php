<?php

namespace Red1986\TelegramApi\Routes;

use Illuminate\Support\Facades\Route;

Route::group( [ 'namespace' => 'Red1986\TelegramApi\Controllers',
    'as' => 'telegramApi.',
], function(){
    Route::get('/telegramApi', ['uses' => 'TelegramApiController@index']);
});
