<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\RegistrationController;

Route::get('/', function () {
    // redireccion temporal para la pagina de eventos
    return redirect('/eventos');
})->name('home');

Route::post('/', [ClientsController::class, 'newSuscription'])->name('newSuscription');

Route::group([
    'controller' => EventController::class,
    'as' => 'guest.events.'
], function () {
    Route::get('/eventos', 'index')->name('index');
    Route::get('/eventos/{event:slug}', 'show')->name('show');
    Route::get('/eventos/{event:slug}/register', 'register')->name('register');
});

Route::post('/eventos/{event:slug}/register', [RegistrationController::class, 'store'])
    ->name('guest.registration.store');

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
