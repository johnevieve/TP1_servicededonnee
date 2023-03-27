<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::resource('taches', SiteController::class)->except([
    'destroy'
]) ->parameters([
    'sites' => 'site'
]) ->middleware(['auth', 'verified']);
