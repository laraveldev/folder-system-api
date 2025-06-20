<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FolderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user' => new UserResource($this->whenLoaded('user')),
            // 'parent_id' => $this->parent_id,
            'name' => $this->name,
            'icon' => new AttachmentResource($this->whenLoaded('icon')),
            'parent' => new FolderResource($this->whenLoaded('parent')),
            'children' => FolderResource::collection($this->whenLoaded('children')),
        ];
    }
}
