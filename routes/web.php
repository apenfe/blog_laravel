<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::view('/', "welcome")->name('home');

Route::view('contacto', "contact")->name('contact');

Route::view('nosotros', "about")->name('about');

Route::resource('blog', PostController::class)->names('posts')->parameters(['blog' => 'post']);

Route::get('admin/{user}', [AdminController::class, 'index'])->name('admin')->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

/*
 * En la vista welcome: no funciona el boton del usuario, añadir desplegable para hacer login o register si no estas logueado
 * si se esta logueado, hacer el logout o acceder a datps del usuario
 *
 * 1º tarea: crear en el layout de invitado un menu para poder iniciar sesión y registrarse
 *
 * 2º En la vista blog, solo debemos de ver los posts que estén publicados, se debe añadir un campo de published at...
 *
 * 3º añadir campo userid a tabla de post para tener el creador del post. Habra que definir la relacion 1 a n entre usuarios y posts
 * se debe modificar el controlador del index, para que ahora ya no aparezcan todos los post, solo los que la fecha de pub sea anterior a la fecha actual
 *
 * 4º Generar una vista para ver los post asociados al usuario logueado, podre verlos, editarlos y si no estan publicados, borrarlos
 *
 * 5º añadir un lastname para el usuario, y mostrarlo en la vista de perfil las dos iniciales, si el usuario no tiene foto
 *
 */
