<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [DashboardController::class, 'index'])->middleware('auth');
Route::post('/getstatus', [DashboardController::class, 'getStatus'])->middleware('auth');
Route::post('/getsummaryilo', [DashboardController::class, 'getSummaryIlo'])->middleware('auth');
Route::post('/getsummaryipmi', [DashboardController::class, 'getSummaryIpmi'])->middleware('auth');
Route::post('/getsummaryxclarity', [DashboardController::class, 'getSummaryXclarity'])->middleware('auth');
Route::post('/getsummarynetapp', [DashboardController::class, 'getSummaryNetapp'])->middleware('auth');

Route::get('/export', [DashboardController::class, 'export'])->middleware('auth');
Route::post('/exportdata', [DashboardController::class, 'exportData'])->middleware(['auth']);
Route::get('/recorddata', [DashboardController::class, 'recordData']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/users', [AdminController::class, 'users'])->middleware(['auth', 'isAdmin']);
Route::post('/getUsers', [AdminController::class, 'getUsers'])->middleware('auth');
Route::get('/servers', [AdminController::class, 'servers'])->middleware(['auth', 'isAdmin']);
Route::post('/getServers', [AdminController::class, 'getServers'])->middleware('auth');

Route::post('/getserversname', [AdminController::class, 'getServersName'])->middleware(['auth']);
Route::post('/getuserdetail', [AdminController::class, 'getUserDetail'])->middleware(['auth', 'isAdmin']);
Route::post('/updateuser', [AdminController::class, 'updateUser'])->middleware(['auth', 'isAdmin']);
Route::post('/adduser', [AdminController::class, 'addUser'])->middleware(['auth', 'isAdmin']);
Route::post('/deleteuser', [AdminController::class, 'deleteUser'])->middleware(['auth', 'isAdmin']);

Route::post('/getserverdetail', [AdminController::class, 'getServerDetail'])->middleware(['auth', 'isAdmin']);
Route::post('/updateserver', [AdminController::class, 'updateServer'])->middleware(['auth', 'isAdmin']);
Route::post('/addserver', [AdminController::class, 'addServer'])->middleware(['auth', 'isAdmin']);
Route::post('/deleteserver', [AdminController::class, 'deleteServer'])->middleware(['auth', 'isAdmin']);

Route::get('/formreport', [DashboardController::class, 'formReport']);

// Route::get('/report/{date_start}/{date_end}/{servers}/{times}', [DashboardController::class, 'generateReport'])->middleware(['auth']);
