<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\SaleController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home',function(){
    return view('home');
});

Route::get('/index',[ProductController::class, 'index']);
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/index', function () {
//    return view('index');
//})->middleware(['auth'])->name('index');//6/18 /indexにアクセスするとindex.blade.phpのビューが表示される。ログインで認証された場合のみ。

/**--resourceで作成したものは、自動的に必要なルーティングが作成される。 */
Route::resource('products', ProductController::class);
Route::resource('companies', CompanyController::class);
Route::resource('sales', SaleController::class);

