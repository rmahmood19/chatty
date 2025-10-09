<?php

namespace Tests;

use App\Models\User;

trait TestHelper
{
    public function createUser($attributes = []): User
    {
        return User::factory()->create($attributes);
    }
}