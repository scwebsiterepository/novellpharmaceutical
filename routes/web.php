<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BarangController;

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
//     return view('landing');
// });

//Landing
Route::get('/', [LandingController::class, 'index'])->name('landing');

//Register
Route::get('/register', [RegisterController::class,'index']) -> name('register');
Route::post('/register', [RegisterController::class,'store']) -> name('register.store');

//Login
Route::get('/login', [LoginController::class,'index']) -> name('login');
Route::post('/login', [LoginController::class,'authenticate']) -> name('authenticate');

//Middleware
Route::middleware('auth')->group(function(){

//Logout
Route::post('/logout', [LoginController::class,'logout']) -> name('logout');

//Dashboard & Searching
Route::get('/dashboard', [DashboardController::class,'index']) -> name('dashboard');
Route::get('/dashboard/search', [DashboardController::class,'search']) -> name('search');

//Barang
Route::get('/barang', [BarangController::class,'index']) -> name('perkategori.anak');

//Product Show
Route::get('/product/show/{id}', [ProductController::class, 'show'])->name('product.show');

//Slider
Route::get('/slider', [SliderController::class,'index']) -> name('slider.index');
Route::post('/slider', [SliderController::class,'store']) -> name('slider.store');
Route::get('/slider/create', [SliderController::class,'create']) -> name('slider.create');
Route::put('/slider/{id}', [SliderController::class,'update']) -> name('slider.update');
Route::get('/slider/edit/{id}',[SliderController::class,'edit']) -> name('slider.edit');
Route::delete('/slider/{id}',[SliderController::class,'destroy']) -> name('slider.destroy');

//Slider by Admin
Route::get('/admin', [AdminController::class,'index']) -> name('admin.index');
Route::post('/admin', [AdminController::class,'store']) -> name('admin.store');
Route::get('/admin/create', [AdminController::class,'create']) -> name('admin.create');
Route::put('/admin/{id}', [AdminController::class,'update']) -> name('admin.update');
Route::get('/admin/edit/{id}',[AdminController::class,'edit']) -> name('admin.status');
Route::delete('/admin/{id}',[AdminController::class,'destroy']) -> name('admin.destroy');

//Status
Route::get('/status', [StatusController::class,'index']) -> name('status.index');
Route::post('/status', [StatusController::class,'store']) -> name('status.store');
Route::get('/status/create', [StatusController::class,'create']) -> name('status.create');
Route::put('/status/{id}', [StatusController::class,'update']) -> name('status.update');
Route::get('/status/edit/{id}',[StatusController::class,'edit']) -> name('status.edit');
Route::delete('/status/{id}',[StatusController::class,'destroy']) -> name('status.destroy');

//Category
Route::get('/category', [CategoryController::class,'index']) -> name('category.index');
Route::post('/category', [CategoryController::class,'store']) -> name('category.store');
Route::get('/category/create', [CategoryController::class,'create']) -> name('category.create');
Route::put('/category/{id}', [CategoryController::class,'update']) -> name('category.update');
Route::get('/category/edit/{id}',[CategoryController::class,'edit']) -> name('category.edit');
Route::delete('/category/{id}',[CategoryController::class,'destroy']) -> name('category.destroy');

//Product
Route::get('/product', [ProductController::class,'index']) -> name('product.index');
Route::post('/product', [ProductController::class,'store']) -> name('product.store');
Route::get('/product/create', [ProductController::class,'create']) -> name('product.create');
Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');
Route::get('/product/edit/{id}',[ProductController::class,'edit']) -> name('product.edit');
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

//User
Route::get('/user', [UserController::class, 'index']) -> name('user.index');
Route::post('/user', [UserController::class,'store']) -> name('user.store');
Route::get('/user/create', [UserController::class,'create']) -> name('user.create');
Route::put('/user/{id}', [UserController::class,'update']) -> name('user.update');
Route::get('/user/edit/{id}',[UserController::class,'edit']) -> name('user.edit');
Route::delete('/user/{id}',[UserController::class,'destroy']) -> name('user.destroy');

//Role
Route::get('/role', [RoleController::class, 'index']) -> name('role.index');
Route::post('/role', [RoleController::class,'store']) -> name('role.store');
Route::get('/role/create', [RoleController::class,'create']) -> name('role.create');
Route::put('/role/{id}', [RoleController::class,'update']) -> name('role.update');
Route::get('/role/edit/{id}',[RoleController::class,'edit']) -> name('role.edit');
Route::delete('/role/{id}',[RoleController::class,'destroy']) -> name('role.destroy');


});

