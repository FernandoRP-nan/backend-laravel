<?php

use App\Http\Controllers\ReportTaskController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', TestController::class);


//cuando descomento esto se pone loco laravel xd
Route::get('report-task', ReportTaskController::class);

Route::prefix('users/')
    ->name('users.')
    ->group(function (){
        Route::get('get-user/{user}', [UserController::class, 'getUser'])
            ->name('get_name');

        Route::post('upsert/{user}', [UserController::class, 'upsert'])
            ->name('upsert');

        Route::post('update/{user}', [UserController::class, 'update'])
            ->name('update');

        Route::post('update-2/{user}/{todoId}', [UserController::class, 'update2'])
            ->name('update_2');

        Route::post('get-user-by-email/{user:email}', [UserController::class, 'getUserByEmail'])
            ->name('get_user_by_email');
    });
