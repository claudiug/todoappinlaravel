<?php

Route::get('/', 'HomeController@home');
Route::resource('todos', 'TodosController');