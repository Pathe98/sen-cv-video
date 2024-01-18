<?php

use App\Http\Controllers\Post_Controller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentaireController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\post;

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
// Route Accueil
Route::get('/', function () {
    return view('welcome');
});

// Route aprés connexion
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Route profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route redirection et Admin
    Route::get('/accueil', [AdminController::class, 'index']);
    Route::get('/admindashboard', [AdminController::class, 'admin'])->name('admin.admindashboard');
    Route::get('/admindashboard/list', 'AdminController@list')->name('list');
    Route::get('/admindashboard/list/delete/{{ $user->id }}', 'AdminController@deleteUser($id)')->name('admin.deleteUser');
    // Ajoutez d'autres routes administratives si nécessaire





// Route Posts
Route::get('posts',[Post_Controller::class, 'index'])->name('post.index');
Route::post('posts',[Post_Controller::class, 'store'])->name('post.store');
Route::get('post/details/{post}', [CommentaireController::class, 'show'])->name('post.details.show');
Route::post('post/details/{post}/comment', [CommentaireController::class, 'commentaire'])->name('post.details.comment');
Route::get('post/details/{commentaire}/delete', [CommentaireController::class, 'deleteComment'])->name('commentaire.delete');

require __DIR__.'/auth.php';
