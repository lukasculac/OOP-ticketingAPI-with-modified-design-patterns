<?php

use App\Http\Controllers\Api\V1\AgentController;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\FileController;
use App\Http\Controllers\Api\V1\TicketController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\WorkerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('v1/register', [AuthController::class, 'register']);
Route::post('v1/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('v1/logout', [AuthController::class, 'logout']);
    Route::post('v1/store_ticket', [TicketController::class, 'store']);
});

Route::post('v1/edit_ticket/{ticket}', [TicketController::class, 'update']);
Route::post('v1/edit_ticket/{ticket}/response', [TicketController::class, 'submitResponse']);
Route::post('v1/handleTicketStatus/{ticket}', [TicketController::class, 'handleTicketState']);
Route::middleware('auth:sanctum')->get('v1/sameDepartmentTickets', [AgentController::class, 'getSameDepartmentTickets']);
Route::middleware('auth:sanctum')->get('v1/otherTickets', [AgentController::class, 'getOtherTickets']);


Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function () {
    Route::apiResource('tickets', TicketController::class)->middleware('auth:sanctum');
    Route::apiResource('workers', WorkerController::class);
    Route::apiResource('files', FileController::class);
    Route::apiResource('agents', AgentController::class);
    Route::delete('/agents/{agent}', [AgentController::class, 'destroy']);
    Route::delete('/workers/{worker}', [WorkerController::class, 'destroy']);
    Route::delete('/tickets/{ticket}', [TicketController::class, 'destroy']);
    Route::delete('/delete_file/{file}', [FileController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::get('v1/listNotClosedTickets', [TicketController::class, 'findNotClosed']);
Route::get('v1/listHighPriorityTickets', [TicketController::class, 'findHighPriority']);
Route::get('v1/listTicketsOfHighPriorityNotClosed', [TicketController::class, 'listTicketsOfHighPriorityNotClosed']);


Route::get('v1/logs', function () {
    $filePath = storage_path('logs/CustomLog.log');
    if (!file_exists($filePath)) {
        return response()->json(['error' => 'File not found'], 404);
    }

    $content = file_get_contents($filePath);
    if ($content === false) {
        return response()->json(['error' => 'Failed to read file'], 500);
    }

    return response()->json(['content' => $content]);
});

Route::get('v1/logs/clear', function () {
    $filePath = storage_path('logs/CustomLog.log');
    if (!file_exists($filePath)) {
        return response()->json(['error' => 'File not found'], 404);
    }

    // Clear the file content
    if (file_put_contents($filePath, '') === false) {
        return response()->json(['error' => 'Failed to clear file'], 500);
    }

    return response()->json(['message' => 'Log file cleared successfully']);
});








