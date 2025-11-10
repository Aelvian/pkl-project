<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ResponseController;

Route::get('/', function (){
    return redirect()->route('login');
});

//  login
Route::get('auth/login', [AuthController::class, "showLoginForm"])->name('login');
Route::post('auth/postLogin',[AuthController::class, "login"])->name("postLogin");


// register
Route::get('auth/register',[AuthController::class, "ShowRegisterForm"])->name('register');
Route::post('auth/postRegister',[AuthController::class, "register"])->name('postRegister');



Route::middleware(['auth'])->group(function(){
    Route::post('logout',[AuthController::class, "logout"])->name('logout');
    Route::resource('tickets', TicketController::class);

    Route::get('/tickets/{ticket}/info', [TicketController::class, 'info'])->name('tickets.info');

    Route::put('/tickets/{ticket}',[TicketController::class, 'update'])->name('tickets.update');
    Route::delete('/tickets/{id}',[TicketController::class, 'destroy'])->name('tickets.destroy');
    Route::get('tickets/{ticket}/view', [TicketController::class, 'view'])->name('tickets.view');
    Route::get('/tickets/{ticket}/download', [TicketController::class, 'download'])->name('tickets.download');
   

    Route::post('/tickets/{ticket}/responses', [ResponseController::class, 'store'])->name('responses.store');
    Route::delete('/response/{id}', [ResponseController::class, 'destroy'])->name('destroy.response');


    Route::middleware(['CekRole:admin'])->group(function (){
        Route::put('/tickets/{ticket}/update-pengajuan', [TicketController::class, 'updateStatus'])->name('tickets.UpdatePengajuan');
    });

    
});

