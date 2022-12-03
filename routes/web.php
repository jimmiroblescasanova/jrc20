<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\Admin\AdminTagController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminEventController;
use App\Http\Controllers\Admin\AdminClientsController;

Route::get('/', function () {
    // redireccion temporal para la pagina de eventos
    return redirect('/eventos');
})->name('home');


Route::group([
    'controller' => EventController::class,
    'as' => 'guest.events.'
], function () {
    Route::get('/eventos', 'index')->name('index');
    Route::post('/eventos', 'suscription')->name('suscription');
    Route::get('/eventos/{event:slug}', 'show')->name('show');
    Route::post('/eventos/{event:slug}', 'invite')->name('invite');
});

Route::group([
    'controller' => RegistrationController::class,
    'as' => 'guest.registration.'
], function () {
    Route::get('/eventos/{event:slug}/register', 'register')->name('register');
    Route::post('/eventos/{event:slug}/register', 'store')->name('store');
});

Route::group([
    'middleware' => ['auth', 'verified'],
    'prefix' => '/admin',
    'as' => 'admin.'
], function(){

    Route::get('/', [AdminHomeController::class, 'index'])->name('dashboard');

    // Ruta para marcar las notificaciones leidas
    Route::post('/readAll', function () {
        auth()->user()->unreadNotifications->markAsRead();
        return back();
    })->name('readAll');
    
    Route::group([
        'controller' => AdminClientsController::class,
        'prefix' => '/clientes-registrados',
        'as' => 'clients.'
    ], function (){
        Route::get('/', 'index')->name('index');
        Route::post('/{client}/unsuscribe', 'unsuscribe')->name('unsuscribe');
    });

    Route::group([
        'controller' => AdminEventController::class,
        'prefix' => '/eventos',
        'as' => 'events.',
    ], function () {
        Route::get('/', 'index')->name('index');
        Route::get('/crear-evento', 'create')->name('create');
        Route::post('/crear-evento', 'store')->name('store');
        Route::get('/{event}/ver-evento', 'show')->name('show');
        Route::patch('/{event}/ver-evento', 'update')->name('update');
        Route::delete('/{event}/ver-evento', 'delete')->name('delete');
    });

    Route::group([
        'controller' => AdminTagController::class,
        'prefix' => '/tags',
        'as' => 'tags.',
    ], function (){
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::delete('/{tag}', 'destroy')->name('destroy');
    });

});

require __DIR__.'/auth.php';
