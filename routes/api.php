<?php

use Illuminate\Http\Request;

use App\Http\Controllers\ProductsController;
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


Route::resource('products', ProductsController::class);


Route::get('/products/search/{name}', [ProductsController::class, 'search']);

/*
Route::post('/products', [ProductsController::class, 'store']);
*/
/*Route::post('/products', function (){
    return  products::create(
        [
            "name" => "Product Tea",
            "slug" => "Product-Tea",
            "description" => "Green Tea",
            "price" => "20"
        ]);
});*/
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
