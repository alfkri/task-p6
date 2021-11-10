<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

# import StudentCotroller
use App\Http\Controllers\StudentController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


# Get All Resource
Route::get('/students', [StudentController::class, 'index']);

# Add Resource
Route::post('/students', [StudentController::class, 'store']);

# Get Detail Resource
Route::get('/students/{id}', [StudentController::class, 'show']);

# Update Resource
Route::put('/students/{id}', [StudentController::class, 'update']);

# Delete Resource
Route::delete('/students/{id}', [StudentController::class, 'destroy']);