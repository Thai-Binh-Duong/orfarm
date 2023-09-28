<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/dasboard', 'PublicController@index');
// Route::get('/home', 'PublicController@index')->name('home');

// GUEST 
Route::get('/','PublicController@index')->name('public.home');
// CART
Route::get('/cart/add/{id}','CartController@add')->name('cart.add');
Route::get('/cart/show','CartController@show')->name('cart.show');
Route::get('/cart/remove{id}','CartController@remove')->name('cart.remove');
Route::post('/cart/update','CartController@update_ajax')->name('cart-update');
// PRODUCT DETAIL
Route::get('/product/{id}','ProductDetailController@show')
    ->name('product.detail');
// Route::get('/product/{slug}-{id}.html','ProductDetailController@show')
//     ->where('slug', '[a-zA-Z0-9-_]+') 
//     ->where('id', '[0-9]+')
//     ->name('product.detail');
// ABOUT PAGE
Route::get('/page/about-us','AboutUsController@show')->name('about-us.show');
// CONTACT PAGE
Route::get('/page/contact','ContactController@show')->name('contact.show');
// ORDER 
Route::get('/order/add','OrderController@add')->name('order.add');
// BLOG
Route::get('/post/show','PostController@show')->name('post.show');
Route::get('/post/detail/{post}','PostController@detail')->name('post.detail');
// GUEST LOGIN
Route::post('/guest/login','GuestController@login')->name('guest.login');
// GUEST REGISTER
Route::post('/guest/register','GuestController@register')->name('guest.register');
// FILTER POST
Route::get('/post/category/{category}','PostController@filter')->name('post.filter');
// PRODUCT SHOP
Route::get('/shop/show','ProductController@show')->name('shop.show');
// PRODUCT SEARCH
Route::post('/search/product','ProductController@search')->name('product.search');
// FILTER 
Route::post('/shop/filter/product','ProductController@filter')->name('shop.filter');
// FILTER CATEGORY
Route::get('/product/category/{category}','ProductController@filterProductByCategory')->name('filter.category');
// TEST ORDER BLADE
// Route::get('/test','GuestController@test')->name('test.order.blade');


// ADMINTRATOR 
Route::middleware(['auth'])->prefix('admin')->group(function(){
    // Dashboard
    Route::get('/','DashboardController@show');
    Route::get('/dashboard','DashboardController@show')->name('admin');
    // User
    Route::get('/user/list','AdminUserController@list');
    Route::get('/user/add','AdminUserController@add');
    Route::post('/user/store','AdminUserController@store')->name('admin.user.store');
    Route::get('/user/delete/{user}','AdminUserController@delete');
    // User - forceDelete
    Route::get('/user/action','AdminUserController@action');
    Route::get('/user/edit/{user}','AdminUserController@edit')->name('admin.user.edit');
    Route::get('/user/update{user}','AdminUserController@update')->name('admin.user.update');
    // Permission
    Route::get('/permission/add','PermissionController@add')->name('admin.permission.add');
    Route::post('/permission/store','PermissionController@store')->name('admin.permission.store');
    Route::get('/permission/edit/{id}','PermissionController@edit')->name('admin.permission.edit');
    Route::post('/permission/update/{id}','PermissionController@update')->name('admin.permission.update');
    Route::get('/permission/delete/{id}','PermissionController@delete');
    // Role
    Route::get('/role','RoleController@list')->name('admin.role.list');
    // ->middleware('can:role.view');
    Route::get('/role/add','RoleController@add')->name('admin.role.add');
    Route::post('/role/store','RoleController@store')->name('admin.role.store');
    Route::get('/role/edit/{role}','RoleController@edit')->name('admin.role.edit');
    Route::get('/role/update/{role}','RoleController@update')->name('admin.role.update');
    Route::get('/role/delete/{role}','RoleController@delete')->name('admin.role.delete');
    // PRODUCT CATEGORY
    Route::get('/product/category/list','ProductCategoryController@list')->name('product.category.list');
    Route::post('/product/category/store','ProductCategoryController@store')->name('product.category.store');
    Route::get('/product/category/edit/{cat}',"ProductCategoryController@edit")->name('product.category.edit');
    Route::post('/product/category/update/{cat}',"ProductCategoryController@update")->name('product.category.update');
    Route::get('/product/category/delete/{cat}',"ProductCategoryController@delete")->name('product.category.delete');
    //PRODUCT BRAND
    Route::get('/product/brand/list','ProductBrandController@list')->name('product.brand.list');
    Route::post('/product/brand/store','ProductBrandController@store')->name('product.brand.store');
    Route::get('/product/brand/edit/{brand}','ProductBrandController@edit')->name('product.brand.edit');
    Route::post('/product/brand/update/{brand}','ProductBrandController@update')->name('product.brand.update');
    Route::get('/product/brand/delete/{brand}','ProductBrandController@delete')->name('product.brand.delete');
    //PRODUCT TAG
    Route::get('/product/tag/list','ProductTagController@list')->name('product.tag.list');
    Route::post('/product/tag/store','ProductTagController@store')->name('product.tag.store');
    Route::get('/product/tag/edit/{tag}','ProductTagController@edit')->name('product.tag.edit');
    Route::post('/product/tag/update/{tag}','ProductTagController@update')->name('product.tag.update');
    Route::get('/product/tag/delete/{tag}','ProductTagController@delete')->name('product.tag.delete');
    // PRODUCT
    Route::get('/product/list','ProductController@list')->name('admin.product.list');
    Route::get('/product/add','ProductController@add')->name('admin.product.add');
    Route::post('/product/store','ProductController@store')->name('admin.product.store');
    Route::get('/product/edit/{product}','ProductController@edit')->name('admin.product.edit');
    Route::post('/product/update/{product}','ProductController@update')->name('admin.product.update');
    Route::get('/product/delete/{product}','ProductController@delete')->name('admin.product.delete');
    // PRODUCT - ForceDelete
    Route::get('/product/action','ProductController@action')->name('admin.product.action');
    // POST CATEGORY
    Route::get('/post/category/list','PostCategoryController@list')->name('admin.post.category.list');
    Route::get('/post/category/add','PostCategoryController@add')->name('admin.post.category.add');
    Route::post('/post/category/store','PostCategoryController@store')->name('admin.post.category.store');
    Route::get('/post/category/edit/{post}','PostCategoryController@edit')->name('admin.post.category.edit');
    Route::post('/post/category/update/{post}','PostCategoryController@update')->name('admin.post.category.update');
    Route::get('/post/category/delete/{post}','PostCategoryController@delete')->name('admin.post.category.delete');
    // POST 
    Route::get('/post/list','PostController@list')->name('admin.post.list');
    Route::get('/post/action','PostController@action')->name('admin.post.action');
    Route::get('/post/add','PostController@add')->name('admin.post.add');
    Route::post('/post/store','PostController@store')->name('admin.post.store');
    Route::get('/post/edit/{post}','PostController@edit')->name('admin.post.edit');
    Route::post('/post/update/{post}','PostController@update')->name('admin.post.update');
    Route::get('/post/delete/{post}','PostController@delete')->name('admin.post.delete');
    // SLIDER
    Route::get('/slide/list','SlideController@list')->name('admin.slide.list');
    Route::get('/slide/add','SlideController@add')->name('admin.slide.add');
    Route::post('/slide/store','SlideController@store')->name('admin.slide.store');
    Route::get('/slide/edit/{slide}','SlideController@edit')->name('admin.slide.edit');
    Route::post('/slide/update/{slide}','SlideController@update')->name('admin.slide.update');
    Route::get('/slide/delete/{slide}','SlideController@delete')->name('admin.slide.delete');
    // ORDER
    Route::get('/order/list','OrderController@list')->name('admin.order.list');
    Route::get('/order/detail/{order}','OrderController@detail')->name('admin.order.detail');
    Route::post('/order/update/{order}','OrderController@update')->name('admin.order.update');
    Route::get('/order/delete/{order}','OrderController@delete')->name('admin.order.delete');
    Route::post('/order/action','OrderController@action')->name('admin.order.action');
});


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
