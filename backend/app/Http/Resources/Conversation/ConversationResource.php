<?php

namespace App\Http\Resources\Conversation;

use App\Http\Resources\Message\MessageResource;
use App\Models\Conversation;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Conversation
 */
class ConversationResource extends JsonResource
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
            'type' => $this->type,
            'creator_id' => $this->creator_id,
            'created_at' => $this->created_at,
            'messages' => MessageResource::collection($this->whenLoaded('messages'))
        ];
    }
}
