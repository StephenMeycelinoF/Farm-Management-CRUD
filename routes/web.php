<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\BreedController;
use App\Http\Controllers\MedicalRecordController;
use App\Http\Controllers\OwnerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.dashboard');
})->name('layouts.dashboard');

// Halaman utama untuk menampilkan data hewan
Route::get('/animals', function () {
    return view('animals.index');
})->name('animals.index');

// Route untuk CRUD operasi hewan
Route::post('/animals/store', [AnimalController::class, 'store'])->name('animals.store');
Route::get('/animals/getall', [AnimalController::class, 'getall'])->name('animals.getall');
Route::get('/animals/count', [AnimalController::class, 'count'])->name('animals.count');
Route::get('/animals/{id}/edit', [AnimalController::class, 'edit'])->name('animals.edit');
Route::post('/animals/update', [AnimalController::class, 'update'])->name('animals.update');
Route::delete('/animals/delete', [AnimalController::class, 'delete'])->name('animals.delete');


Route::get('/owners', function () {
    return view('owners.index');
})->name('owners.index');

// Route untuk CRUD operasi owners
Route::post('/owners/store', [OwnerController::class, 'store'])->name('owners.store');
Route::get('/owners/getall', [OwnerController::class, 'getall'])->name('owners.getall');
Route::get('/owners/count', [OwnerController::class, 'count'])->name('owners.count');
Route::get('/owners/{id}/edit', [OwnerController::class, 'edit'])->name('owners.edit');
Route::post('/owners/update', [OwnerController::class, 'update'])->name('owners.update');
Route::delete('/owners/delete', [OwnerController::class, 'delete'])->name('owners.delete');

Route::get('/breeds', function () {
    return view('breeds.index');
})->name('breeds.index');

// Route untuk CRUD operasi breeds
Route::post('/breeds/store', [BreedController::class, 'store'])->name('breeds.store');
Route::get('/breeds/getall', [BreedController::class, 'getall'])->name('breeds.getall');
Route::get('/breeds/count', [BreedController::class, 'count'])->name('breeds.count');
Route::get('/breeds/{id}/edit', [BreedController::class, 'edit'])->name('breeds.edit');
Route::post('/breeds/update', [BreedController::class, 'update'])->name('breeds.update');
Route::delete('/breeds/delete', [BreedController::class, 'delete'])->name('breeds.delete');

Route::get('/medicalRecords', function () {
    return view('medicalRecords.index');
})->name('medicalRecords.index');

// Route untuk CRUD operasi medicalRecords
Route::post('/medicalRecords/store', [MedicalRecordController::class, 'store'])->name('medicalRecords.store');
Route::get('/medicalRecords/getall', [MedicalRecordController::class, 'getall'])->name('medicalRecords.getall');
Route::get('/medicalRecords/count', [MedicalRecordController::class, 'count'])->name('medicalRecords.count');
Route::get('/medicalRecords/{id}/edit', [MedicalRecordController::class, 'edit'])->name('medicalRecords.edit');
Route::put('/medicalRecords/update/{id}', [MedicalRecordController::class, 'update'])->name('medicalRecords.update');
Route::delete('/medicalRecords/delete', [MedicalRecordController::class, 'delete'])->name('medicalRecords.delete');
