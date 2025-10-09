<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Conversation;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ConversationControllerTest extends TestCase
{
    #[Test]
    public function user_can_create_a_conversation_with_another_user()
    {
        $user1 = $this->createUser();

        $user2 = $this->createUser();

        $this->actingAs($user1);

        $response = $this->postJson('/api/conversations', [
            'user_id' => $user2->id,
        ]);

        $response->assertStatus(200);

        $conversation = Conversation::find($response->json('id'));

        $usersInConversation = $conversation->users->pluck('id');

        $this->assertTrue($usersInConversation->contains($user1->id));
        $this->assertTrue($usersInConversation->contains($user2->id));

        $this->assertDatabaseHas('conversations', [
            'dm_first_user_id' => $user1->id,
            'dm_second_user_id' => $user2->id,
        ]);

        $user1->refresh();
        $user2->refresh();

        $this->assertCount(1, $user1->conversations);
        $this->assertCount(1, $user2->conversations);
    }

    #[Test]
    public function user_can_not_create_a_conversation_with_self()
    {
        $user1 = $this->createUser();

        $this->actingAs($user1);

        $response = $this->postJson('/api/conversations', [
            'user_id' => $user1->id,
        ]);

        $response->assertStatus(422);
    }

    #[Test]
    public function two_user_can_not_create_multiple_conversation_between_themself()
    {
        $user1 = $this->createUser();

        $user2 = $this->createUser();

        $this->actingAs($user1);

        $response = $this->postJson('/api/conversations', [
            'user_id' => $user2->id,
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas('conversations', [
            'dm_first_user_id' => $user1->id,
            'dm_second_user_id' => $user2->id,
        ]);

        $response = $this->postJson('/api/conversations', [
            'user_id' => $user2->id,
        ])->assertStatus(200);

        $count = Conversation::where('dm_first_user_id', min($user1->id, $user2->id))
            ->where('dm_second_user_id', max($user1->id, $user2->id))
            ->count();

        $this->assertEquals(1, $count);
    }
}
