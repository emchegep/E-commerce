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

Route::get('/', function () {
    return view('frontend.index');
});

Auth::routes();


//frontend
Route::get('collection/{group_url}','Frontend\CollectionController@groupview');
Route::get('collection/{group_url}/{category_url}','Frontend\CollectionController@categoryview');
Route::get('collection/{group_url}/{category_url}/{product_url}','Frontend\CollectionController@subcategoryview');

Route::group(['middleware'=>['auth','isUser']], function (){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/my-profile','Frontend\UserController@myprofile');
    Route::post('/my-profile-update','Frontend\UserController@profileupdate');
});

Route::group(['middleware'=>['auth','isAdmin']], function (){
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    Route::get('registered-user','Admin\RegisteredController@index');
    Route::get('role-edit/{id}','Admin\RegisteredController@edit');
    Route::put('role-update/{id}','Admin\RegisteredController@updaterole');

    //Groups\
    Route::get('/group','Admin\GroupController@index');
    Route::get('/group-add','Admin\GroupController@viewpage');
    Route::post('group-store','Admin\GroupController@store');
    Route::get('group-edit/{id}','Admin\GroupController@edit');
    Route::put('group-update/{id}','Admin\GroupController@update');
    Route::get('group-delete/{id}','Admin\GroupController@delete');
    Route::get('group-deleted-records','Admin\GroupController@deletedrecords');
    Route::get('group-restore/{id}','Admin\GroupController@deletedrestore');

    //Category
    Route::get('category','Admin\CategoryController@index');
    Route::get('category-add','Admin\CategoryController@create');
    Route::post('category-store','Admin\CategoryController@store');
    Route::get('category-edit/{id}','Admin\CategoryController@edit');
    Route::put('category-update/{id}','Admin\CategoryController@update');
    Route::get('category-delete/{id}','Admin\CategoryController@delete');
    Route::get('category-deleted','Admin\CategoryController@deletedcategories');
    Route::get('category-restore/{id}','Admin\CategoryController@deletedrestore');

    //subcategory
    Route::get('subcategory','Admin\SubcategoryController@index');
    Route::post('subcategory-store','Admin\SubcategoryController@store');
    Route::get('subcategory-edit/{id}','Admin\SubcategoryController@edit');
    Route::put('subcategory-update/{id}','Admin\SubcategoryController@update');
    Route::get('subcategory-delete/{id}','Admin\SubcategoryController@delete');
    Route::get('subcategory-deleted','Admin\SubcategoryController@deletedsubcategories');
    Route::get('subcategory-restore/{id}','Admin\SubcategoryController@deletedrestore');

    //Product
    Route::get('products','Admin\ProductController@index');
    Route::get('add-product','Admin\ProductController@create');
    Route::post('store-products','Admin\ProductController@store');
    Route::get('edit-product/{id}','Admin\ProductController@edit');
    Route::put('update-products/{id}','Admin\ProductController@update');
    Route::get('delete-product/{id}','Admin\ProductController@delete');
    Route::get('deleted-products','Admin\ProductController@deletedproducts');
    Route::get('restore-product/{id}','Admin\ProductController@restoreproducts');
});

Route::group(['middleware'=>['auth','isVendor']], function (){
    Route::get('/vendor-dashboard', function () {
        return view('vendor.dashboard');
    });
});