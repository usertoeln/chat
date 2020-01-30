<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Events\PublicMessageEvent;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/public_send', 'SendMessageController@public_send');
Route::post('/public_chat_send', 'SendMessageController@public_chat_send');
