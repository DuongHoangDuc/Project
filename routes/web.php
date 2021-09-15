<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\BrandProduct;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryPost;
use App\Http\Controllers\PostController;
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


// ==========================================back-end=======================================
//=================================== VIEW =========================================
Route::get('/admin', [Admincontroller::class, "index"])->name('admin.index');
Route::get('/dashboard', [Admincontroller::class, "dashboard"])->name('dashboard.dashboard');
//=================================== ADmin login===================
Route::post('/login-admin', [Admincontroller::class, "login_admin"])->name('login-admin.login_admin');
//=================================== ADmin logout===================
Route::get('/logout', [Admincontroller::class, "logout"])->name('logout.logout');
// ============================================== Post=============================
Route::get('/post',[PostController::class, "post"])->name('post.post');
// view add brand
Route::get('/add-post',[PostController::class, "add_post"])->name('add-post.add_post');
// save category
Route::post('/save-post', [PostController::class, "save_post"])->name('save-post.save_post');
// delete category
Route::get('/delete-post/{post_id}',[PostController::class, "delete_post"])->name('delete-post.delete_post');
// view edit category
Route::get('/edit-post/{post_id}',[PostController::class, "edit_post"])->name('edit-post.edit_post');
// update category
Route::post('/update-post/{post_id}', [PostController::class, "update_post"])->name('update-post.update_post');
// ============================================== Post=============================
// ==============================================Category Post=============================
Route::get('/category-post',[CategoryPost::class, "category_post"])->name('category-post.category_post');
// view add brand
Route::get('/add-category-post',[CategoryPost::class, "add_category"])->name('add-category-post.add_category_post');
// save category
Route::post('/save-category-post', [CategoryPost::class, "save_category"])->name('save-category.save_category');
// delete category
Route::get('/delete-category-post/{category_id}',[CategoryPost::class, "delete_category"])->name('delete-category-post.delete_category');
// view edit category
Route::get('/edit-category-post/{category_id}',[CategoryPost::class, "edit_category"])->name('/edit-category-post.edit_category');
// update category
Route::post('/update-category-post/{category_id}', [CategoryPost::class, "update_category"])->name('update-category-post.update_category');
// ==============================================Category Post=============================
// ==============================================Product=============================
// view product
Route::get('/product',[ProductController::class, "product"])->name('product.product');
// view add brand
Route::get('/add-product',[ProductController::class, "add_product"])->name('add-product.add_product');
// save category
Route::post('/save-product', [ProductController::class, "save_product"])->name('save-product.save_product');
// delete category
Route::get('/delete-product/{product_id}',[ProductController::class, "delete_product"])->name('delete-product.delete_product');
// view edit category
Route::get('/edit-product/{product_id}',[ProductController::class, "edit_product"])->name('edit-product.edit_product');
// update category
Route::post('/update-product/{product_id}', [ProductController::class, "update_product"])->name('update-product.update_product');
// ==============================================Product=============================
// ==============================================Brand=============================
// view brand
Route::get('/brand',[BrandProduct::class, "brand"])->name('brand.brand');
// view add brand
Route::get('/add-brand',[BrandProduct::class, "add_brand"])->name('add-brand.add_brand');
// save category
Route::post('/save-brand', [BrandProduct::class, "save_brand"])->name('save-brand.save_brand');
// delete category
Route::get('/delete-brand/{brand_id}',[BrandProduct::class, "delete_brand"])->name('delete-brand.delete_brand');
// view edit category
Route::get('/edit-brand/{brand_id}',[BrandProduct::class, "edit_brand"])->name('edit-brand.edit_brand');
// update category
Route::post('/update-brand/{brand_id}', [BrandProduct::class, "update_brand"])->name('update-brand.update_brand');
// ==============================================Brand=============================
// ==============================================Category=============================
//view danh sách 
Route::get('/category',[CategoryProduct::class, "category"])->name('category.index');
// view add category
Route::get('/add-category',[CategoryProduct::class, "add_category"])->name('add-category.add_category');
// save category
Route::post('/save-category', [CategoryProduct::class, "save_category"])->name('save-category.save_category');
// delete category
Route::get('/delete-category/{category_id}',[CategoryProduct::class, "delete_category"])->name('delete-category.delete_category');
// view edit category
Route::get('/edit-category/{category_id}',[CategoryProduct::class, "edit_category"])->name('edit-category.edit_category');
// update category
Route::post('/update-category/{category_id}', [CategoryProduct::class, "update_category"])->name('update-category.update_category');
// kích hoạt
Route::get('/active-category/{category_id}',[CategoryProduct::class, "active_category"])->name('active-category.active_category');
Route::get('/unactive-category/{category_id}',[CategoryProduct::class, "unactive_category"])->name('unactive-category.unactive_category');
// ==============================================Category=============================
// ==========================================back-end=======================================
// ==========================================front-end=======================================
Route::get('/home', [HomeController::class, "index"])->name('client.home');
Route::get('/', [HomeController::class, "index"])->name('client.home');
// ==========================================front-end=======================================

