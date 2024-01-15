<?php

use App\Http\Controllers\Post_Controller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// web.php ou routes/web.php

    Route::get('/accueil', [AdminController::class, 'index']);
    // Route::get('/admin/user-list', 'AdminController@userList')->name('admin.userList');
    // Route::get('/admin/delete-user/{id}', 'AdminController@deleteUser')->name('admin.deleteUser');
    // Ajoutez d'autres routes administratives si nécessaire






Route::get('posts',[Post_Controller::class, 'index'])->name('post.index');
Route::post('posts',[Post_Controller::class, 'store'])->name('post.store');

require __DIR__.'/auth.php';
