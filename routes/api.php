<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

Route::middleware('api_token')->group(function () {

    Route::post('/cadastrar_lead', [Controller::class, 'cadastrar_lead'])->name('cadastrar_lead');
    Route::get('/gerar_leads', [Controller::class, 'gerar_leads'])->name('gerar_leads');
    Route::get('/pegar_leads', [Controller::class, 'pegar_leads'])->name('pegar_leads');
});
