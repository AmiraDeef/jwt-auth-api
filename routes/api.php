<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use App\Http\Traits\apiHandeller;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\ForgetPasswordController;



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

//create a user route
Route::get('/user-create', function (Request $request) {
    App\Models\User::create([
        'name' => 'mariam',
        'email' => 'mariam@gmail.com',
        'password' => Hash::make("123456789"),

    ]);
});

//login a user
//Route::post("/login", function (Request $request) {
//
//    $credentials = request()->only(['email', 'password']);
//    $token = auth()->attempt($credentials);
//    $apiHandler = new apiHandeler();
//    return $apiHandler->successMessage($token);
//     //return response()->json($token);
//});
Route::post("/login",[\App\Http\Controllers\Controller::class,'login']);
Route::get("/getById",[\App\Http\Controllers\Controller::class,'getById']);



//get a single authenticated user
Route::middleware('auth:api')->get('/me', function (Request $request) {
    $user = auth()->user();
    return $user->id;
});

Route::post('/password/forget-password',[ForgetPasswordController::class,'forgetPassword']);
Route::post('/password/reset',[ResetPasswordController::class,'PasswordReset']);

Route::post('/uploadImage',[ImageController::class,'uploadImage']);




//logout a user
