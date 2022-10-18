<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TerminalController;

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

    //Terminal
    Route::get('/terminal', [TerminalController::class, 'terminal']);
    Route::post('/terminalpost', [TerminalController::class, 'terminalpost']);
