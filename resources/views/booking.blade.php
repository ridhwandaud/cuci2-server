@extends('layout')

@section('content')
<h1>Edit BOOKING</h1>

	<form method="POST" action="/save/{{$booking->id}}">
		{{ csrf_field() }}
		<div class="form-group">
			{{$booking->id}}
		</div>
		<div class="form-group">
			<textarea name="title" class="form-control">{{$booking->title}}</textarea>
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary">Save Booking</button>
		</div>
		
	</form>

@stop