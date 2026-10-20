<?php

use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TicketController::class, 'index'])->name('home'); // TODO - add ->middleware('auth') once user authentication is built.
Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index'); // TODO - add ->middleware('auth') once user authentication is built.
Route::get('/tickets/{ticket}', [TicketController::class, 'show'])->name('ticket.show'); // TODO - add ->middleware('auth') once user authentication is built.
