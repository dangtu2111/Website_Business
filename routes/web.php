<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AccountController;

Route::get('accountUser', [AccountController::class, 'user'])->name('accountUser');
