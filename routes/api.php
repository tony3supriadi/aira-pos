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
    'create', 'edit'
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

Route::get('/module/json', 'ModuleController@json');
Route::resource('/module', 'ModuleController')->except([
    'create', 'edit'
]);

Route::resource('/rule', 'RuleController')->except([
    'create', 'edit'
]);

Route::resource('/employee', 'EmployeeController')->except([
    'create', 'edit'
]);

Route::post('/profile-store', 'ProfileController@update');