<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\FamilyMembers;

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

Route::get('/users', [UserController::class, 'index'])->name('users.index');

Route::livewire('/family-members', FamilyMembers::class)->name('family-members');
Route::get('/family-members/{id}/edit', [FamilyMembers::class, 'edit'])->name('family.edit');
Route::put('/family-members/{id}', [FamilyMembers::class, 'update'])->name('family.update');
Route::delete('/family-members/{id}', [FamilyMembers::class, 'deleteFamilyMember'])->name('family.delete');