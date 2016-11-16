@extends('layout')

@section('content')
<h1>BOOKING</h1>
	@foreach($bookings as $booking)
		<div>
			<a>{{$booking->title}}</a>
		</div>
	@endforeach

	<form method="POST" action="/create/booking">
		{{ csrf_field() }}
		<div class="form-group">
			<textarea name="title" class="form-control"></textarea>
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary">Add Booking</button>
		</div>
		
	</form>	
@stop