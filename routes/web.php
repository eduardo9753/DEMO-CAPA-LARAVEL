<?php

use App\Http\Controllers\Chatbot\chat\BotManController;
use App\Http\Controllers\Dashboard\dashboard\DashboardController;
use App\Http\Controllers\Room\room\RoomController;
use App\Http\Controllers\user\auth\LoginController;
use Illuminate\Support\Facades\DB;
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

/*
Route::get('/', function () {
    try {
        $results = DB::connection('oracle')->select('select * from administrador');
        //$results = DB::connection('mysql')->select('SELECT * FROM conversation');
        dd($results);
    } catch (\Exception $e) {
        dd($e->getMessage());
    }
    //phpinfo();
});*/



Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/user/store', [LoginController::class, 'store'])->name('user.login.store');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/user/dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/user/dashboard/show/{course}', [DashboardController::class , 'show'])->name('dashboard.show');

Route::get('/user/course/enroller/{course}', [RoomController::class, 'enrolled'])->name('room.enrolled');
Route::get('/user/room/classroom/{course}', [RoomController::class, 'index'])->name('room.index');
Route::post('/user/room/classroom/signature', [RoomController::class, 'firmar'])->name('room.firmar');

Route::post('/botman', [BotManController::class, 'handle'])->name('chat.conversation');
Route::get('/chat', [BotManController::class, 'index'])->name('chat.index');
