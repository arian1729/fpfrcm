<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HtmlController;

Route::get('/', function () {
    return view('login');
});
 
Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');

    


});
 
Route::group(['middleware' => 'auth'], function () {
  
   


    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::get('/home', [HomeController::class, 'iindex']);
    // Route::get('/invoice/create-invoice', [InvoiceController::class, 'invoice']);
    // Route::post('/create-invoice', [InvoiceController::class, 'InvoicePost']);
    
  Route::get('/category/index',[CategoryController::class, 'index']);
  Route::post('category',[CategoryController::class, 'IndexPost']);

  
  
  
});

