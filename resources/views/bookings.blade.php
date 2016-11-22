@extends('layout')

@section('content')
<h1>BOOKING</h1>
	
	<div class="list-group">
		@foreach($bookings as $booking)
		<li class="list-group-item clearfix">
			 {{$booking->id}} ) {{$booking->title}}
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
		</li>
		@endforeach
	</div>

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