<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreHabitRequest;
use App\Http\Requests\UpdateHabitRequest;
use App\Http\Resources\HabitResource;
use App\Models\Habit;

class HabitController extends Controller
{
    public function index()
    {
        return HabitResource::collection(
            Habit::query()
                ->when(
                    request()->string('with')->contains('user'),
                    fn ($query) => $query->with('user')
                )
                ->when(
                    request()->string('with')->contains('logs'),
                    fn ($query) => $query->with('logs')
                )
                ->paginate()
        );
    }

    public function show(Habit $habit)
    {
        $allowedRelations = ['logs', 'user'];

        $load = request()->string('with')->explode(',')
            ->filter(fn ($relation): bool => in_array($relation, $allowedRelations))
            ->toArray();

        return HabitResource::make($habit->load($load));
    }

    public function store(StoreHabitRequest $request)
    {
        $data = $request->validated();

        $habit = Habit::create(array_merge($data, ['user_id' => 1]));

        return HabitResource::make($habit);
    }

    public function update(UpdateHabitRequest $request, Habit $habit)
    {
        $data = $request->validated();

        $habit->update($data);

        return HabitResource::make($habit);
    }

    public function destroy(Habit $habit)
    {
        $habit->delete();

        return response()->noContent();
    }
}
