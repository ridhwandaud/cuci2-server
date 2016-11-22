<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use View;
use Illuminate\Support\Facades\Redirect;

class BookingsController extends Controller
{	
	public function index()
	{
		$bookings = Booking::all();
		return $bookings;
	}

	public function show()
	{
		$bookings = Booking::all();
		return view('bookings',compact('bookings'));
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

    public function save(Request $request, $id)
    {
    	$booking = Booking::find($id);

    	$booking->title = $request->input('title');

    	$booking->save();

    	$bookings = Booking::all();

    	// return view('bookings',compact('bookings'));
    	// return back();
    	return Redirect::to('/');
    }

    public function delete()
    {
    	Booking::truncate();
    }

      public function deleteById($id)
    {
    	$booking = Booking::find($id);

    	$booking->delete();

    	$bookings = Booking::all();

    	// return view('bookings',compact('bookings'));

    	return Redirect::to('/');
    }


    public function edit($id)
    {
    	$booking = Booking::find($id);
    	//return $bookings;
    	return view('booking',compact('booking'));
    	// return back();
    }
}
