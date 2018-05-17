<?php

Route::resource('/category', 'CategoriesController')->except([
    'create', 'edit'
]);

Route::resource('/unit', 'UnitsController')->except([
    'create', 'edit'
]);

Route::resource('/library', 'LibraryController')->except([
    'create', 'edit'
]);

Route::resource('/sku', 'SkuController')->except([
    'create', 'edit', 'store'
]);
Route::get('/sku/search/{src}', 'SkuController@search');