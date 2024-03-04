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
    return view('roast');
});

Route::post('/roast', function () {
    $attributes = request()->validate([
        'topic' => 'required|string|min:2'
    ]);

    $audio = (new Chat())->send(
        message: "Please roast {$attributes['topic']} in a sarcastic tone.",
        speech: true
    );

    file_put_contents(public_path($file = "/ai/".md5($audio).".mp3"), $audio);

    return redirect('/')->with([
       'file' => $file,
        'flash' => 'Boom. Roasted!'
    ]);
});
