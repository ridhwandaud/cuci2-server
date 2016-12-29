<?php

namespace App\Repositories;

use App\User;

class TransactionRepository
{
    /**
     * Get all of the tasks for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function forUser(User $user)
    {
        return $user->bookings()
                    ->orderBy('created_at', 'asc')
                    ->get();
    }
}