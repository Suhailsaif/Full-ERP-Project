use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

<?php


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

Route::middleware(['auth:sanctum', 'tenant'])->group(function () {
    // All protected API routes here
});
