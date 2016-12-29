<?php

namespace App\Policies;

use App\User;
use App\Booking;
use Illuminate\Auth\Access\HandlesAuthorization;

class TransactionPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function destroy(User $user,Booking $booking)
    {
         return $user->id === $booking->user_id;
    }
}
