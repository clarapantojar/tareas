<?php

use Illuminate\Support\Facades\Route;

//la url es /task/task para que se llegue a ese return
Route::get('/', function () {
    return "ok";
});
