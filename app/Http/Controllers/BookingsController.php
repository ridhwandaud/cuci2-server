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

        $total = 0;
        foreach ($bookings as $index => $value) {
            $total += $value->amount;
        }

        foreach ($bookings as $index => $value) {
            $bookings[$index]->total = $total;
        }
        return $bookings;
	}

	public function show()
	{
		$bookings = Booking::all();

        $total = 0;
        foreach ($bookings as $index => $value) {
            $total += $value->amount;
        }

        foreach ($bookings as $index => $value) {
            $bookings[$index]->total = $total;
        }

        $bookings->total = $total;

		return view('bookings',compact('bookings'));
	}
	
	public function store(Request $request)
    {
    	$booking = new Booking;
        $total = 0;
    	// $title = $request->input('title');
    	$booking->title = $request->input('title');
        $booking->date_transaction = $request->input('date_transaction');
        $booking->amount = $request->input('amount');
    	$booking->save();

        $sameDate = Booking::where('date_transaction',$request->input('date_transaction'))->get();

        //adding total amount in same date 
        foreach ($sameDate as $index => $value) {
            $total += $value->amount;
        }

        foreach ($sameDate as $index => $value) {
            $sameDate[$index]->total_same_date = $total;
            $sameDate[$index]->save();
        }

        //add all transactions amount
        $bookings = Booking::all();
        $totalAll = 0;
        foreach ($bookings as $index => $value) {
            $totalAll += $value->amount;
        }

        foreach ($bookings as $index => $value) {
            $bookings[$index]->total_all = $totalAll;
            $bookings[$index]->save();
        }



        // return $sameDate;


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
