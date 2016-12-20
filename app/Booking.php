<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['title','amount','date_transaction'];

    /**
     * Get the user that owns the task.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
