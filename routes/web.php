<?php

use App\Http\Controllers\PersonController;
use App\Models\Person;
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

Route::get('/people/{person}/edit', [PersonController::class, 'edit'])->name('people.edit');

Route::put('/people/{person}', [PersonController::class, 'update'])->name('people.update');

Route::delete('/people/{person}', [PersonController::class, 'delete'])->name('person.delete');

Route::get('/people/{id}', function($id) {
    $person = Person::find($id);
    return view('people.show')->with(['person' => $person]);
})->name('people.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
