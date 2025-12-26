<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkshopController;

// เมื่อเข้าหน้าแรกให้ Redirect ไปที่หน้าฟอร์ม
Route::redirect('/', '/workshop/html-form');

// หน้าแสดงฟอร์ม
Route::get('/workshop/html-form', [WorkshopController::class, 'index'])->name('workshop.form');

// หน้ารับค่าจากฟอร์มเพื่อประมวลผล
Route::post('/workshop/html-form', [WorkshopController::class, 'store'])->name('workshop.store');
