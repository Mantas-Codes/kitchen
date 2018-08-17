<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PublicContentController@index')->name('index');


Auth::routes();
Route::middleware(['auth'])->group(function (){
    Route::get('/myrecipes', 'UsersDashboarController@myRecipes')->name('myRecipes');
    Route::get('/profile', 'UsersDashboarController@profile')->name('profile');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', 'UsersDashboarController@dashboard')->name('admin.dashboard');
    Route::resource('categories', 'CategoriesController')->except('show');
    Route::delete('/categories/destroypermentaly/{category}', 'CategoriesController@destroyPermentaly')->name('categories.destroyPermantaly');
    Route::get('/categories/restore/{category}', 'CategoriesController@restore')->name('categories.restore');
    Route::get('/categories/trashed', 'CategoriesController@trashed')->name('categories.trashed');

    Route::get('recipes/trashed', 'RecipesController@trashed')->name('recipes.trashed');

    Route::get('/users', 'UsersDashboarController@users')->name('admin.allUsers');
    Route::delete('/users/delete/{user}', 'UsersDashboarController@destroyUser')->name('admin.deleteUser');
});

Route::resource('recipes', 'RecipesController');