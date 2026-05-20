use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\Project\ProjectController;
use App\Http\Controllers\API\Attendance\AttendanceController;
use App\Http\Controllers\API\Payroll\PayrollController;
<?php



    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login',    [AuthController::class, 'login']);

    Route::middleware(['auth:sanctum', 'tenant'])->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::get('/me',      [AuthController::class, 'me']);
    });

Route::middleware([
    'auth:sanctum',
    'tenant'
])->prefix('v1')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Projects
    |--------------------------------------------------------------------------
    */

    Route::apiResource(
        'projects',
        ProjectController::class
    );

    /*
    |--------------------------------------------------------------------------
    | Attendance
    |--------------------------------------------------------------------------
    */

    Route::post(
        'attendance/punch-in',
        [AttendanceController::class, 'punchIn']
    );

    Route::post(
        'attendance/punch-out',
        [AttendanceController::class, 'punchOut']
    );

    /*
    |--------------------------------------------------------------------------
    | Payroll
    |--------------------------------------------------------------------------
    */

    Route::post(
        'payroll/generate',
        [PayrollController::class, 'generate']
    );

   



});
