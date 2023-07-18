<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;

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

Route::get('/home',function(){ return view('home');});


//Route::middleware('auth')->group(function(){
// 商品情報画面のルーティング
Route::get('/index',[ProductController::class, 'index'])->name('index');

// 新規登録画面
Route::get('/create', [ProductController::class, 'create'])->name('create');

// 登録処理
Route::post('/store', [ProductController::class, 'store'])->name('store');

// 検索機能
Route::get('/search', [ProductController::class, 'search'])->name('search');
//Route::post('/search', [ProductController::class, 'Search'])->name('search');

//詳細画面
Route::get('/detail/{id}', [ProductController::class, 'showDetail'])->name('detail');

// 編集画面
Route::get('/details/edit/{id}', [ProductController::class, 'showEdit'])->name('edit');

//編集画面更新
Route::put('/edit/update{id}', [ProductController::class, 'update'])->name('update')->middleware('web');

// 削除
Route::delete('/index/delete/{id}', [ProductController::class, 'delete'])->name('delete');

//});
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/index', function () {
//    return view('index');
//})->middleware(['auth'])->name('index');//6/18 /indexにアクセスするとindex.blade.phpのビューが表示される。ログインで認証された場合のみ。

/**--resourceで作成したものは、自動的に必要なルーティングが作成される。 */
//Route::resource('products', ProductController::class);
//Route::resource('companies', CompanyController::class);
//Route::resource('sales', SaleController::class);

