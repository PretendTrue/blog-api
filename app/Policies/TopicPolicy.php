<?php

namespace App\Policies;

use App\Models\Topic;
use App\Models\User;

class TopicPolicy extends Policy
{
    public function update(User $user, Topic $topic): bool
    {
        return $user->isAuthorOf($topic);
    }

    public function delete(User $user, Topic $topic): bool
    {
        return $user->isAuthorOf($topic);
    }
}
