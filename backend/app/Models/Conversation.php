<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @mixin IdeHelperConversation
 */
class Conversation extends Model
{
    use SoftDeletes;
    //
    protected $fillable = [
        'type',
        'dm_first_user_id',
        'dm_second_user_id',
        'creator_id'
    ];

    //******************************//
    //**  Relationships           **//
    //******************************//

    /**
     * The users that belong to the conversation.
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function messages(): Builder|HasMany
    {
        return $this->hasMany(Message::class);
    }

}
