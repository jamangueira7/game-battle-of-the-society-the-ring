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

Route::get('/', ['as' => 'game.index','uses' => 'Game@index']);
Route::get('/new', ['as' => 'game.new','uses' => 'Game@new']);
Route::post('/hero', ['as' => 'game.hero','uses' => 'Game@hero']);
Route::post('/villains', ['as' => 'game.villains','uses' => 'Game@villains']);
Route::get('/backoff', ['as' => 'game.backoff','uses' => 'Game@backoff']);
Route::get('/battle', ['as' => 'game.battle','uses' => 'Game@battle']);
