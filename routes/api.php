<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HelpersController;


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
;
Route::prefix('helpers')->group(function () {
    Route::get('/projects', [HelpersController::class, 'projects']);
    Route::get('/clients', [HelpersController::class, 'clients']);
    Route::get('/contracts', [HelpersController::class, 'contracts']);
    Route::get('/job-types', [HelpersController::class, 'jobTypes']);
    Route::get('/countries', [HelpersController::class, 'countries']);
    Route::get('/states', [HelpersController::class, 'states']);
    Route::get('/branches', [HelpersController::class, 'branches']);
    Route::get('/categories', [HelpersController::class, 'categories']);
    Route::get('/level-types', [HelpersController::class, 'levelTypes']);
    Route::get('/question-types', [HelpersController::class, 'questionTypes']);
    Route::get('/services', [HelpersController::class, 'services']);
    Route::get('/project-know-us', [HelpersController::class, 'projectKnowUs']);
    Route::get('/project-types', [HelpersController::class, 'projectTypes']);
    Route::get('/project-areas', [HelpersController::class, 'projectAreas']);
    Route::get('/project-durations', [HelpersController::class, 'projectDurations']);
    Route::get('/project-ages', [HelpersController::class, 'projectAges']);
    Route::get('/project-statuses', [HelpersController::class, 'projectStatuses']);
    Route::get('/payment-types', [HelpersController::class, 'paymentTypes']);

});
