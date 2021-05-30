<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class CustomerResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'surname' => $this->surname,
            'photoUrl' => Storage::exists(optional($this->photo)->path) ?
                Storage::url($this->photo->path) :
                null,
            'created_by' => $this->createdBy,
            'updated_by' => $this->updatedBy,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
        ];
    }
}
