<?php

declare(strict_types = 1);

use App\Http\Controllers\HabitController;
use App\Http\Controllers\HabitLogController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn (): array => [config('app.name')]);

Route::prefix('api')->name('api.')->group(function (): void {
    Route::apiResource('habits', HabitController::class)->scoped(['habit' => 'uuid']);
    Route::get('habits/{habit:uuid}/logs', [HabitLogController::class, 'index'])->name('habit_logs.index');
    Route::post('habits/{habit:uuid}/logs', [HabitLogController::class, 'store'])->name('habit_logs.store');
});
