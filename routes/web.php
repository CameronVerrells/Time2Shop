<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\ShoppingList;

Route::get('/', function () {return view('home');})->name('home');

Route::get('/shopping-list/{id}', function ($id) {
    $shoppingList = \App\Models\ShoppingList::find($id);
    return view('shopping-list', ['shoppingList' => $shoppingList]);
})->name('shopping-list');