<?php

use App\Http\Controllers\KomplainController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('komplain.index');
});

Route::resource('komplain', KomplainController::class);