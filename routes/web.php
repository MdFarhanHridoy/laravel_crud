<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubcategoryController;

Route::get('/', function () {
    return redirect()->route('categories.index');
});

Route::resource('categories', CategoryController::class);

Route::resource('subcategories', SubcategoryController::class);

Route::get('products/{slug}', [ProductController::class, 'show'])->name('products.show.slug');

Route::resource('products', ProductController::class)->except(['show']);

Route::get('api/subcategories/{category}', [ProductController::class, 'getSubcategories']);
