<?php
use App\Http\Controllers\SkiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\BrandController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;  

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('skis', SkiController::class);
Route::resource('types', TypeController::class);
Route::resource('brands', BrandController::class);
Route::resource('users', UserController::class);

Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);


 Route::get('skis/brand/{id}',[SkiController::class,'getByBrand']);

 Route::get('skis/type/{id}',[SkiController::class,'getByType']);


 Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });

    Route::get('my-skis',[SkiController::class,'mySkis']);

    Route::get('/logout',[AuthController::class,'logout']);

    Route::resource('skis',SkiController::class)->only('store','update','destroy'); 

    Route::resource('types',TypeController::class)->only('store'); 
    Route::resource('brands',BrandController::class)->only('store');
}); 

