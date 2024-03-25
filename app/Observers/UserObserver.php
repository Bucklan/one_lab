<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    public function creating(User $user): void
    {
        if (!request()->filled('password')) {
            $user->password = bcrypt('user123');
        } else {
            $user->password = bcrypt(request()->input('password'));
        }
    }

}