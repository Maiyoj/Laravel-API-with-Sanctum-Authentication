<?php

use Illuminate\Http\Request;

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::get('/products', function (){
    return  products::all();
});*/

//public Routes
//Route::resource('products', ProductsController::class);

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/products/search/{name}', [ProductsController::class, 'search']);
Route::get('/products/search/{id}', [ProductsController::class, 'show']);
Route::get('/products', [ProductsController::class, 'index']);


//Protected Routes
Route::group(['middleware'=> ['auth:sanctum']],function(){
Route::post('/products', [ProductsController::class, 'store']);
Route::put('/products{$id}', [ProductsController::class, 'update']);
Route::delete('/products{$id}', [ProductsController::class, 'destroy']);
Route::post('/logout', [AuthController::class, 'logout']);
});


/*
Route::post('/products', [ProductsController::class, 'store']);
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/