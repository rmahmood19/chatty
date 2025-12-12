<?php

namespace Tests;

use App\Enums\ConversationType;
use App\Models\Conversation;
use App\Models\User;

trait TestHelper
{
    public function createUser($attributes = []): User
    {
        return User::factory()->create($attributes);
    }

    /**
     * Create a conversation between two users
     */
    public function createConversation($userOne, $userTwo): Conversation
    {
        return Conversation::create([
            'type' => ConversationType::PRIVATE,
            'creator_id' => $userOne->id,
            'dm_first_user_id' => $userOne->id,
            'dm_second_user_id' => $userTwo->id,
        ]);
    }
}