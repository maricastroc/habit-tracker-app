<?php

declare(strict_types = 1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HabitResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    #[\Override]
    public function toArray(Request $request): array
    {
        return [
            'uuid'  => $this->uuid,
            'title' => $this->title,
            'logs'  => HabitLogResource::collection($this->whenLoaded('logs')),
            'user'  => UserResource::make($this->whenLoaded('user')),
            'links' => [
                'self' => route('api.habits.show', $this),
            ],
        ];
    }
}
