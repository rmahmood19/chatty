<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperConversation
 */
class Conversation extends Model
{
    //
    protected $fillable = [
        'type',
        'dm_first_user_id',
        'dm_second_user_id',
        'creator_id'
    ];
}
