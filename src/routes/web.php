<?php
Route::get('test', function () {
    return 'test';
});

Route::get('weather', [\Haseeb\Session\Http\Controllers\WeatherController::class, 'weather']);
Route::post('weather', [\Haseeb\Session\Http\Controllers\WeatherController::class, 'getForecast'])->name('weather');
