<?php
use Illuminate\Support\Facades\Route;

Route::get('/vuejs', [App\Http\Controllers\VueJs\PageController::class, 'index'])->name('index');
Route::get('/vuejs/todo', [App\Http\Controllers\VueJs\PageController::class, 'todo'])->name('todo');

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/api.php';

//use App\Http\Controllers\Admin\ProfileController;
require __DIR__.'/auth.php';
// 管理画面
Route::get('/admin', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('dashboard');

Route::get('/{pathMatch}', [App\Http\Controllers\VueJs\PageController::class, 'notFound'])->name('notfound')->where('pathMatch',".*");



