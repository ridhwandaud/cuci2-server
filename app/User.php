<?php

namespace App;
use App\Booking;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

     public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function getTotalSameDate(Request $request)
    {
        return Booking::where('date_transaction', $request->input('date_transaction'))
               ->get();
    }
}
