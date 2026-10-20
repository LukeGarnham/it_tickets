<?php

use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

// TODO - add ->middleware('auth') once user authentication is built.
Route::get('/', [TicketController::class, 'index'])->name('home'); // TODO - build a dashboard and set this as the home page OR remove the below duplicate route.
Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');
Route::get('/tickets/{ticket}', [TicketController::class, 'show'])->name('ticket.show');
