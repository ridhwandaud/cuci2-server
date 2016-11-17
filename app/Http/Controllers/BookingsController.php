<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;

class BookingsController extends Controller
{	
	public function index()
	{
		$bookings = Booking::all();
		return $bookings;
		return view('booking',compact('bookings'));
	}

	public function show()
	{
		$bookings = Booking::all();
		return view('booking',compact('bookings'));
	}
	
	public function store(Request $request)
    {
    	$booking = new Booking;
    	$title = $request->input('title');
    	$booking->title = $title;
    	$booking->save();

    	//return $booking;

    	return back();
    }

    public function delete()
    {
    	Booking::truncate();
    }
}
