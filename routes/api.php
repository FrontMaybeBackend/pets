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
    Route::get('/pet/findByStatus/{status}',[PetController::class,'status'])->name('pets.status');
    Route::get('/pet/{id}',[PetController::class,'show'])->name('pets.show');
    Route::get('/pet/edit/{id}',[PetController::class,'edit'])->name('pets.edit');
    Route::post('/pet/{id}/uploadImage',[PetController::class,'storeImage'])->name('pets.storeImage');

    Route::put('/pet/{id}',[PetController::class,'update'])->name('pets.update');
    Route::delete('pet/{id}',[PetController::class,'destroy'])->name('pets.delete');
    Route::post('/pet',[PetController::class,'store'])->name('pets.store');


});

