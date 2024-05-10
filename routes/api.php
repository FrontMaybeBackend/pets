<?php

use App\Http\Controllers\PetController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::middleware(['guest', 'web'])->group(function () {
    Route::get('/pet/index',[PetController::class,'index'])->name('pets.index');
    Route::get('/pet/create',[PetController::class,'create'])->name('pets.create');
    Route::get('/pet/{pet}',[PetController::class,'show'])->name('pets.show');
    Route::get('/pet/edit/{pet}',[PetController::class,'edit'])->name('pets.edit');
    Route::put('/pet/{pet}',[PetController::class,'update'])->name('pets.update');
    Route::delete('pet/{pet}',[PetController::class,'destroy'])->name('pets.delete');
    Route::post('/pet',[PetController::class,'store'])->name('pets.store');

    Route::resource('pets', PetController::class);
});

