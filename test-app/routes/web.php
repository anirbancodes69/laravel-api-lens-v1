<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

for ($i = 1; $i <= 100; $i++) {
    Route::get("/test-$i", function () use ($i) {
        return "Route $i";
    });
}

for ($i = 1; $i <= 20; $i++) {
    Route::get("/slow-$i", function () use ($i) {
        usleep(rand(700000, 1500000));
        return "Slow Route $i";});
}

for ($i = 1; $i <= 10; $i++) {
    Route::get("/error-$i", function () use ($i) {
        abort(500, "Error Route $i");
    });
}