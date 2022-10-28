<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;

Route::get('/', function () {
    // redireccion temporal para la pagina de eventos
    return redirect('/eventos');
})->name('home');

Route::post('/', [ClientsController::class, 'newSuscription'])->name('newSuscription');

Route::get('/eventos', function () {
    return view('events');
})->name('events');

Route::group([
    'middleware' => ['auth', 'verified'],
    'prefix' => '/admin',
    'as' => 'admin.'
], function(){

    Route::get('/dashboard', function() {
        return view('admin.dashboard');
    })->name('dashboard');
    
    Route::group([
        'controller' => ClientsController::class,
        'prefix' => '/clientes-registrados',
        'as' => 'clients.'
    ], function (){
        Route::get('/', 'index')->name('index');
    });

});

require __DIR__.'/auth.php';
