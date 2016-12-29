<?php 

namespace App\Repositories;

use App\User;

class TransactionRepository{


	public function forUser(User $user)
	{
		return $user->bookings()
					->orderBy('created_at','asc')
					->get();	
	}
}