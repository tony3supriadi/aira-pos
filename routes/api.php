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
Route::get('/sku/library/{id}', 'SkuController@library');
Route::get('/sku/search/{src}', 'SkuController@search');

Route::resource('/supplier', 'SupplierController')->except([
    'create', 'edit'
]);

Route::resource('/purchase', 'PurchaseController')->except([
    'create', 'edit'
]);
Route::get('/purchase/between/{start}/{end}', 'PurchaseController@between');

Route::resource('/customer', 'CustomerController')->except([
    'create', 'edit'
]);

Route::resource('/sale', 'SaleController')->except([
    'create', 'edit'
]);
Route::get('/sale/between/{start}/{end}', 'SaleController@between');

Route::resource('/module', 'ModuleController')->except([
    'create', 'edit'
]);

Route::resource('/rule', 'RuleController')->except([
    'create', 'edit'
]);