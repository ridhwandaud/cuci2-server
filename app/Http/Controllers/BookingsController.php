<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Controllers\Input;

class BookingsController extends Controller
{	
    public function __construct()
    {
        $this->middleware('auth');
    }
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

	public function show(Request $request)
	{
		

        $bookings = $request->user()->bookings()->paginate(3);

        return view('bookings',compact('bookings'));
	}
	
	public function store(Request $request)
    {   
        //default
        $total = 0;

        $this->validate($request, [
            'title' => 'required|max:255',
            'amount' => 'required',
        ]);

        $request->user()->bookings()->create([
            'title' => $request->title,
            'amount' => $request->amount,
            'date_transaction' => $request->date_transaction,
        ]);

        $sameDate =  $request->user()->getTotalSameDate($request);

        foreach ($sameDate as $index => $value) {
            $total += $value->amount;
        }

        foreach ($sameDate as $index => $value) {
            $sameDate[$index]->total_same_date = $total;
            $sameDate[$index]->save();
        }


        $totalAll = 0;

        $bookings = $request->user()->bookings()->get();
        foreach ($bookings as $index => $value) {
            $totalAll += $value->amount;
        }

        foreach ($bookings as $index => $value) {
            $bookings[$index]->total_all = $totalAll;
            $bookings[$index]->save();
        }

        return back();
    }

    public function save(Request $request, $id)
    {
    	$booking = Booking::find($id);

    	$booking->title = $request->input('title');

    	$booking->save();

    	$bookings = Booking::all();

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

    	return Redirect::to('/');
    }


    public function edit($id)
    {
    	$booking = Booking::find($id);
    	return view('booking',compact('booking'));
    }


    public function query(Request $request)
    {
        $bookings = Booking::all()->where('title',$request->input('title'));

        if($request->has('date_transaction')) {
            $bookings =  Booking::all()->where('date_transaction', $request->input('date_transaction') );
        }

        return $bookings;

        return view('query',compact('bookings'));

        $query->where('title', Input::get('title'));
        

        return $request->input();
    }
}
