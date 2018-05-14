<?php

Route::resource('/category', 'CategoriesController')->except([
    'create', 'edit'
]);