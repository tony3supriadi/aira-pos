<?php

Route::resource('/category', 'CategoriesController')->except([
    'create', 'edit'
]);

Route::resource('/unit', 'UnitsController')->except([
    'create', 'edit'
]);