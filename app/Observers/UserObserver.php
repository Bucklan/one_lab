<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    public function creating(User $user): void
    {
        if (!request()->isNotFilled('password')) {
            $user->password = bcrypt(request()->get('password'));
        } else {
            $user->password = bcrypt('user123');
        }
    }
}