<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Backend\IndexxController;

use App\Http\Controllers\Backend\ManageProductController;
use App\Http\Controllers\Backend\ManageStaffController;
use App\Http\Controllers\Backend\ManageUserController;
use App\Http\Controllers\Backend\InStockController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\TotalStockController;
// use App\Http\Controllers\Backend\FormController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Frontend\PaymentController;

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

Route::get('/redirects',[IndexController::class,'index']);
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/',[IndexController::class,'login']);

Route::get('/admindashboard',[IndexxController::class,'admindashboard']);
Route::get('/productdetails',[IndexxController::class,'productdetails']);
Route::get('/instockdetails',[IndexxController::class,'instockdetails']);
Route::get('/paymentdetails',[IndexxController::class,'paymentdetails']);
Route::get('/totalstockdetails',[IndexxController::class,'totalstockdetails']);





// Route::get('/staffindex', [ManageStaffController::class, 'staffindex'])->name('staffindex');

//Managestaff
Route::get('/staff',[ManageStaffController::class,'iindex'])->name('iindex');
Route::post('/staff',[ManageStaffController::class,'ccreate'])->name('ccreate');
Route::get('/edit/{id}',[ManageStaffController::class,'eedit'])->name('eedit');
Route::put('/edit/{id}',[ManageStaffController::class,'uupdate'])->name('uupdate');
Route::get('/delete/{id}',[ManageStaffController::class,'ddestroy'])->name('ddestroy');


//manageProducts
Route::get('/get_categories/{id}',[ManageProductController::class,'get_category'])->name('get_category');                             
Route::get('/product',[ManageProductController::class,'productindex'])->name('productindex');
Route::post('/product',[ManageProductController::class,'productcreate'])->name('productcreate');
Route::get('/productedit/{id}', [ManageProductController::class, 'productedit'])->name('productedit');
Route::put('/productedit/{id}', [ManageProductController::class, 'productupdate'])->name('productupdate');
Route::get('/productdelete/{id}', [ManageProductController::class, 'productdestroy'])->name('productdestroy');

// //manageOrders
// Route::get('/order',[ManageOrderController::class,'orderindex'])->name('orderindex');
// Route::post('/order',[ManageOrderController::class,'ordercreate'])->name('ordercreate');
// Route::get('/orderedit/{id}', [ManageOrderController::class, 'orderedit'])->name('orderedit');
// Route::put('/orderedit/{id}', [ManageOrderController::class, 'orderupdate'])->name('orderupdate');
// Route::get('/orderdelete/{id}', [ManageOrderController::class, 'orderdestroy'])->name('orderdestroy');


//ManageUsers
Route::get('/user',[ManageUserController::class,'userindex'])->name('userindex');
Route::post('/user',[ManageUserController::class,'usercreate'])->name('usercreate');
Route::get('/useredit/{id}', [ManageUserController::class, 'useredit'])->name('useredit');
Route::put('/useredit/{id}', [ManageUserController::class, 'userupdate'])->name('userupdate');
Route::get('/userdelete/{id}', [ManageUserController::class, 'userdestroy'])->name('userdestroy');


//manageInStock
Route::get('/instock',[InStockController::class,'instockindex'])->name('instockindex');
Route::post('/instock',[InStockController::class,'instockcreate'])->name('instockcreate');
 Route::get('/instockedit/{id}', [InStockController::class, 'instockedit'])->name('instockedit');
 Route::put('/instockedit/{id}', [InStockController::class, 'instockupdate'])->name('instockupdate');
Route::get('/instockdelete/{id}', [InStockController::class, 'instockdestroy'])->name('instockdestroy');

//manageTotalStock
Route::get('/totalstock',[TotalStockController::class,'totalstockindex'])->name('totalstockindex');
Route::post('/totalstock',[TotalStockController::class,'totalstockcreate'])->name('totalstockcreate');
Route::get('/totalstockedit/{id}', [TotalStockController::class, 'totalstockedit'])->name('totalstockedit');
Route::put('/totalstockedit/{id}', [TotalStockController::class, 'totalstockupdate'])->name('totalstockupdate');
Route::get('/totalstockdelete/{id}', [TotalStockController::class, 'totalstockdestroy'])->name('totalstockdestroy');

//manageCategories
Route::get('/categories',[CategoryController::class,'categoriesindex'])->name('categoriesindex');
Route::post('/categories',[CategoryController::class,'categoriescreate'])->name('categoriescreate');
Route::get('/categoriesedit/{id}', [CategoryController::class, 'categoriesedit'])->name('categoriesedit');
Route::put('/categoriesedit/{id}', [CategoryController::class, 'categoriesupdate'])->name('categoriesupdate');
Route::get('/categoriesdelete/{id}', [CategoryController::class, 'categoriesdestroy'])->name('categoriesdestroy');


//manageForm
// Route::get('/form',[FormController::class,'formindex'])->name('formindex');
// Route::post('/form',[FormController::class,'formcreate'])->name('formcreate');
// Route::get('/formedit/{id}', [FormController::class, 'formedit'])->name('formedit');
// Route::put('/formedit/{id}', [FormController::class, 'formupdate'])->name('formupdate');
// Route::get('/formdelete/{id}', [FormController::class, 'formdestroy'])->name('formdestroy');



// order
Route::get('/get_products/{id}',[OrderController::class,'get_products'])->name('get_products');
Route::get('/get_users/{id}',[OrderController::class,'get_users'])->name('get_users');

// Route::get('/{order}/cashondelivery',[PaymentController::class, 'cashondelivery'])->name('cashondelivery');

// Route::post('/place-order',[OrderController::class,'placeorder'])->name('placeorder');


Route::get('/order',[OrderController::class,'orderindex'])->name('orderindex');
Route::post('/order',[OrderController::class,'ordercreate'])->name('ordercreate');
Route::get('/editorder/{id}', [OrderController::class, 'orderedit'])->name('orderedit');
Route::put('/editorder/{id}', [OrderController::class, 'orderupdate'])->name('orderupdate');
Route::get('/deleteorder/{id}', [OrderController::class, 'orderdestroy'])->name('orderdestroy');
Route::get('/vieworder/{id}', [OrderController::class, 'orderview'])->name('orderview');



Route::post('/order-payment',[PaymentController::class,'order_payment'])->name('order_payment');


// Route::get('/Adashboard',[IndexController::class,'Adashboard']);


// Route::get('/search',[IndexxController::class,'search'])->name('searchProduct');

// Route::get('/download', [InStockController::class,'getDownload'])->name('getDownload');
Route::get('/get_stocks/{id}',[ManageProductController::class,'get_stocks'])->name('get_stocks');
