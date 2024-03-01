<?php

use App\AI\Chat;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    $chat = new Chat();
    $response = $chat
            ->systemMessage('You are a poetic assistant, skilled in explaining complex programming concepts with creative flair.')
            ->send('Compose a poem that explains the concept of recursion in programming.');

    $response = $chat->reply('Good but make it silly');

    return view('welcome', [
        'response' => $response
    ]);

});
