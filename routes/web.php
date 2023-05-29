<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminUserController;
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CatController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ClientCustomerController;
use App\Http\Controllers\ClientController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('admin/login', [AdminUserController::class, 'login'])->name('admin.login');
Route::post('admin/login_handle', [AdminUserController::class, 'login_handle'])->name('admin.login_handle');
Route::middleware('auth')->group(function () {
    Route::get('admin/user/show', [AdminUserController::class, 'show'])->name('admin_user.show')->can('user.show');
    Route::get('admin/user/add', [AdminUserController::class, 'add'])->name('admin_user.add')->can('user.add');
    Route::post('admin/user/store', [AdminUserController::class, 'store'])->name('admin_user.store')->can('user.add');
    Route::get('admin/user/profile/{id}', [AdminUserController::class, 'profile_show'])->name('admin_user.profile')->can('user.profile');
    Route::get('admin/user/edit/{id}', [AdminUserController::class, 'edit'])->name('admin_user.edit')->can('user.update');
    Route::post('admin/user/update/{id}', [AdminUserController::class, 'update'])->name('admin_user.update')->can('user.update');
    Route::get('admin/user/softdelete/{id}', [AdminUserController::class, 'softdelete'])->name('admin_user.softdelete')->can('user.delete');
    Route::get('admin/user/search', [AdminUserController::class, 'search_ajax'])->name('admin_user.search_ajax')->can('user.search');
    Route::get('admin/user/force_delete/{id}', [AdminUserController::class, 'force_delete'])->name('admin_user.force_delete')->can('user.force_delete');
    Route::get('admin/user/restore/{id}', [AdminUserController::class, 'restore'])->name('admin_user.restore')->can('user.restore');
    Route::post('admin/user/action', [AdminUserController::class, 'action'])->name('admin_user.action')->can('user.action');
    Route::post('admin/user/arrange', [AdminUserController::class, 'arrange'])->name('admin_user.arrange');
    Route::get('admin/logout', [AdminUserController::class, 'logout'])->name('admin.logout');
    Route::get('admin/permission/show', [PermissionController::class, 'show'])->name('permission.show')->can('permission.show');
    Route::post('admin/permission/store', [PermissionController::class, 'store'])->name('permission.store')->can('permission.add');
    Route::get('admin/permission/edit/{id}', [PermissionController::class, 'edit'])->name('permission.edit')->can('permission.edit');
    Route::post('admin/permission/update/{id}', [PermissionController::class, 'update'])->name('permission.update')->can('permission.edit');
    Route::get('admin/permission/delete/{id}', [PermissionController::class, 'delete'])->name('permission.delete')->can('permission.edit');
    Route::get('admin/role/show', [RoleController::class, 'show'])->name('role.show')->can('role.show');
    Route::get('admin/role/add', [RoleController::class, 'add'])->name('role.add')->can('role.add');
    Route::post('admin/role/store', [RoleController::class, 'store'])->name('role.store')->can('role.add');
    Route::get('admin/role/edit/{id}', [RoleController::class, 'edit'])->name('role.edit')->can('role.edit');
    Route::post('admin/role/update/{id}', [RoleController::class, 'update'])->name('role.update')->can('role.edit');
    Route::get('admin/role/delete/{id}', [RoleController::class, 'delete'])->name('role.delete')->can('role.delete');
    Route::get('admin/cat/add', [CatController::class, 'add'])->name('cat.add');
    Route::post('admin/cat/store', [CatController::class, 'store'])->name('cat.store');
    Route::get('admin/cat/show', [CatController::class, 'show'])->name('cat.show');
    Route::get('admin/cat/detail/{id}', [CatController::class, 'detail'])->name('cat.detail');
    Route::post('admin/cat/action/{id}', [CatController::class, 'action'])->name('cat.action');
    Route::get('admin/product/add', [ProductController::class, 'add'])->name('product.add');
    Route::post('admin/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('admin/product/show', [ProductController::class, 'show'])->name('product.show');
    Route::get('admin/product/detail/{id}', [ProductController::class, 'detail'])->name('product.detail');
    Route::post('admin/product/action/{id}', [ProductController::class, 'action'])->name('product.action');
    Route::get('admin/product/thumb/delete/{id}', [ProductController::class, 'thumb_delete'])->name('thumb.delete');
    Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
    Route::post('admin/product/filter', [ProductController::class, 'filter'])->name('product.filter');
    Route::get('admin/product/search', [ProductController::class, 'search_ajax'])->name('product.search_ajax');
    Route::get('admin/customer/show', [CustomerController::class, 'show'])->name('customer.show');
    Route::get('admin/customer/profile/{id}', [CustomerController::class, 'profile'])->name('customer.profile');
    Route::get('admin/order/show', [OrderController::class, 'show'])->name('order.show');
    Route::get('admin/order/detail/{id}', [OrderController::class, 'detail'])->name('order.detail');
});
Route::get('sapo/login', [ClientCustomerController::class, 'login'])->name('client.login');
Route::get('sapo/register', [ClientCustomerController::class, 'register'])->name('client.register');
Route::get('sapo', [ClientController::class, 'index'])->name('client.index');
Route::post('sapo/register/handle', [ClientCustomerController::class, 'register_handle'])->name('client.register_handle');
Route::post('sapo/login/handle', [ClientCustomerController::class, 'login_handle'])->name('client.login_handle');
Route::get('sapo/logout', [ClientCustomerController::class, 'logout'])->name('client.logout');
Route::get('sapo/product/{name}/{id}', [ClientController::class, 'detail'])->name('c_product.detail');
Route::middleware('auth.customer')->group(function () {
    Route::post('sapo/cart/{id}', [ClientController::class, 'cart_act'])->name('client.cart_act');
    Route::get('sapo/cart/show',[ClientController::class, 'cart_show'])->name('client.cart_show');
    Route::get('sap/cart/cal',[ClientController::class, 'cart_cal'])->name('client.cart_cal');
});
