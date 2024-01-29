<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowStore extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
          'id' =>1,
          'name'=>1,
          'description'=>1,
          'logo' =>1,
          'apis_endpoint'=>1
        ];
    }
}
