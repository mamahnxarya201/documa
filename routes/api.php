<?php

use App\Http\Controllers\DocumentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('document')->middleware([])->group(function () {
    Route::get('/detail/{id}', [DocumentController::class, 'getDetailDocumentById']);
//    Route::get('/document/download/{id}', 'HomeController@download');
//    Route::post('/document/upload', 'HomeController@upload');
});
