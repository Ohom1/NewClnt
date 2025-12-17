<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LeadController;

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

// Lead API endpoints
Route::post('/leads', [LeadController::class, 'apiStore']);
Route::post('/webhooks/brevo', [LeadController::class, 'handleBrevoWebhook']);
Route::post('/webhooks/whatsapp', [LeadController::class, 'handleWhatsAppWebhook']);
