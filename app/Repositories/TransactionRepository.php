<<<<<<< HEAD
<?php
=======
<?php 
>>>>>>> 057b7c182226c3794749eee3869ca4e1c246058c

namespace App\Repositories;

use App\User;

<<<<<<< HEAD
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
=======
class TransactionRepository{


	public function forUser(User $user)
	{
		return $user->bookings()
					->orderBy('created_at','asc')
					->get();	
	}
>>>>>>> 057b7c182226c3794749eee3869ca4e1c246058c
}