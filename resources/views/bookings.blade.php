@extends('layout')

@section('content')
<h1>BOOKING</h1>
	
	<div class="list-group">
		@foreach($bookings as $booking)
		<li class="list-group-item clearfix">
				<p> {{$booking->id}} ) {{$booking->title}}</p>
				<span class="pull-right">
					<a href="/edit/{{$booking->id}}">
						<button class="btn btn-xs btn-info">Edit</button>
					</a>
					<a href="/delete/{{$booking->id}}">
						<button class="btn btn-xs btn-warning">
					  		<span class="glyphicon glyphicon-trash"></span>
						</button>
					</a>
				</span>
				<p>Amount: {{$booking->amount}}</p>
				<p>Date: {{$booking->date_transaction}}</p>
				<p>Total same date: {{$booking->total_same_date}}</p>
		</li>
		@endforeach
		<li>Total All: {{$bookings->total}}</li>
	</div>

	<form method="POST" action="/create/booking">
		{{ csrf_field() }}
		<div class="form-group">
			<input type="number" name="amount" step="0.01">
		</div>

		<div class="form-group">
			<textarea name="title" class="form-control"></textarea>
		</div>

		<div class="form-group">
			<select name="parent_category" id="" class="form-control">
				<option value="">Food</option>
				<option value="">Bill</option>
				<option value="">Transportation</option>
			</select>
		</div>

		<div class="form-group">
			<input name="date_transaction" type="date" class="form-control">
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary">Add Booking</button>
		</div>
		
	</form>	
@stop