<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => ['CORS']], function () {
    Route::post("/githubupdate", "GitHubController@update");
});

Auth::routes();

Route::get('/battlenet/callback', function () {
    return json_encode(array(
        "status" => 200,
        "message" => "Battle.net API callback working!"
    ));
});
Route::get('/', 'HomeController@index');
Route::get('/home', function () {
    return redirect('/');
});

Route::group(['middleware' => ['auth']], function () {
    // Account Preferences Route
    Route::get('/settings', 'AccountController@settings');

    // Save account settings
    Route::post('/settings/timezone/save', 'AccountController@saveTimezone');

    // Middleware for checking if account is active
    Route::group(['middleware' => ['checkactive']], function () {
        // Only active accounts can add games
        Route::get("/games/new", "GameController@new");
        Route::post("/games/add", "GameController@add");
        Route::get('/gamesession/new', 'GameSessionController@addGameSessionForm');
        Route::get('/gametourney/new', 'GameTournamentController@comingsoon');
        // Kerbal Space Program Route
        Route::get('/ksp', function () {
            return view('ksp');
        });
    });

    // Nonactive route
    Route::get('/nonactive', function () {
        return view('nonactive');
    });

    /**
    * Admin routes
    */
    Route::group(array('prefix' => 'admin', 'before' => 'auth', 'middleware' => 'checkadmin'), function() {
        Route::get("/", 'AdminController@main');
        Route::get("/games", 'AdminController@games');
        Route::get('/discord', 'DiscordController@index');
    });
});
