<?php

namespace App\Http\Controllers;

use App\Enums\ConversationType;
use App\Http\Requests\ConversationRequest;
use App\Models\Conversation;

class ConversationController extends Controller
{
    public function index()
    {

    }

    public function store(ConversationRequest $request)
    {
        $userOneId = $request->user()->id;
        $userTwoId = $request->input('user_id');

        // Just to ensure the smaller ID is always first
        // then we can check if a conversation exists between these two users
        // That way we avoid duplicate conversations between same users
        if ($userOneId > $userTwoId) {
            [$userOneId, $userTwoId] = [$userTwoId, $userOneId];
        }

        $conversation = Conversation::firstOrCreate([
            'type' => ConversationType::PRIVATE,
            'creator_id' =>  $request->user()->id,
            'dm_first_user_id' => $userOneId,
            'dm_second_user_id' => $userTwoId,
        ]);

        return response()->json($conversation);

    }
}
