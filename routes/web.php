<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\InputController;
use App\Http\Controllers\ResponseController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/itgenic', function() {
    return "Hello Itgenic";
});

Route::redirect('youtube', 'itgenic');

Route::fallback(function() {
    return '404 by sugeng';
});

Route::view('/hello', 'hello', ['name' => 'Sugeng']);
Route::get('/hello-again', function() {
    return view('hello', ['name' => 'Sugeng']);
});

Route::get('/hello-world', function() {
    return view('hello.world', ['name' => 'Sugeng']);
});

Route::get('products/{id}', function($productId) {
    return "Product $productId";
})->name('product.detail');

Route::get('products/{product}/items/{item}', function($productId, $itemId) {
    return "Product $productId, Item $itemId";
})->name('item.detail');

Route::get('/categories/{id}', function($categoryId) {
    return "Category $categoryId";
})->where('id', '[0-9]+')->name('category.detail');

Route::get('/users/{id?}', function($userId = '404') {
    return "User $userId";
})->name('user.detail');

Route::get('/conflicts/sugeng', function() {
    return "Conflict sugeng oke";
});

Route::get('/conflicts/{id}', function($conflictId) {
    return "Conflict $conflictId";
});

Route::get('/produk/{id}', function($id) {
    $link = route('proudct.detail', ['id' => $id]);
    return "Link $link";
});

Route::get('/produk-redirect/{id}', function($id) {
    return redirect()->route('product.detail', ['id' => $id]);
});

Route::get('controller/hello/request', [HelloController::class, 'request']);
Route::get('controller/hello/{name}', [HelloController::class, 'hello']);

Route::get('/input/hello', [InputController::class, 'hello']);
Route::post('/input/hello', [InputController::class, 'hello']);
Route::post('/input/hello/first', [InputController::class, 'helloFirstName']);
Route::post('/input/hello/input', [InputController::class, 'helloInput']);
Route::post('/input/hello/array', [InputController::class, 'helloArray']);
Route::post('/input/type', [InputController::class, 'inputType']);

Route::post('/input/filter/only', [InputController::class, 'filterOnly']);
Route::post('/input/filter/except', [InputController::class, 'filterExcept']);
Route::post('/input/filter/merge', [InputController::class, 'filterMerge']);

Route::post('/file/upload', [FileController::class, 'upload']);

Route::get('/response/hello', [ResponseController::class, 'response']);
Route::get('/response/header', [ResponseController::class, 'header']);

Route::get('/response/type/view', [ResponseController::class, 'responseView']);
Route::get('/response/type/json', [ResponseController::class, 'responseJson']);
Route::get('/response/type/file', [ResponseController::class, 'responseFile']);
Route::get('/response/type/download', [ResponseController::class, 'responseDownload']);