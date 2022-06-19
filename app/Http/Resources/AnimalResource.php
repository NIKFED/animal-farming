<?php

namespace App\Http\Resources;

use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

class AnimalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    #[ArrayShape([
        'id' => "int",
        'name' => "string",
        'animal_kind_id' => "int",
        'age' => "int",
        'size' => "int",
    ])] public function toArray($request): array
    {
        /** @var Animal $this */
        return [
            'id' => $this->id,
            'name' => $this->name,
            'animal_kind_id' => $this->animal_kind_id,
            'age' => $this->age,
            'size' => $this->size,
        ];
    }
}
