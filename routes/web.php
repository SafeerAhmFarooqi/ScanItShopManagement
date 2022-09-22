<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\FloorController;
use App\Http\Controllers\RentalCustomerController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\SalesReportController;
use App\Http\Controllers\ExpanseController;

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
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    View()->share( 'headTitle', $this->headTitle = 'Dashboard');
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::name('app.')->prefix("shop-management")->middleware(['auth'])->group(function () {
    Route::resource('area', AreaController::class);
    Route::resource('shop', ShopController::class);
    Route::resource('floor', FloorController::class);
    Route::resource('rentalcustomer', RentalCustomerController::class);
    Route::resource('billing', BillingController::class);
    Route::resource('salesreport', SalesReportController::class);
    Route::resource('expanse', ExpanseController::class);
});


require __DIR__.'/auth.php';
