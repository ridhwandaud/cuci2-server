@extends('layouts.app')

@section('content')
<div class="container">
	@if (count($bookings) > 0)
	<div class="row">
		<div class="col col-md-6">
			<div class="list-group">
				@foreach($bookings as $booking)
				<li class="list-group-item clearfix">
						<p>{{$booking->title}}</p>
						<span class="pull-right">
							<a href="/edit/{{$booking->id}}">
								<button class="btn btn-xs btn-info">Edit</button>
							</a>
							<!-- <a href="/delete/{{$booking->id}}">
								<button class="btn btn-xs btn-warning">
							  		<span class="glyphicon glyphicon-trash"></span>
								</button>
							</a> -->
							<form action="{{'delete/'.$booking->id}}" method="POST">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
								<button type="submit" id="delete-booking-{{ $booking->id }}" class="btn btn-danger">
					                <i class="fa fa-trash"></i>
					            </button>
							</form>
						</span>
						<p>Amount: {{$booking->amount}}</p>
						<p>Date: {{$booking->date_transaction}}</p>
						<p>Total same date: {{$booking->total_same_date}}</p>
				</li>
				@endforeach
			</div>
		</div>
		<!-- <div class="col col-md-6 ">
			<form method="GET" action="/query/booking">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="">Amount</label>
							<input type="number" class="form-control" name="amount">
						</div>
						<div class="form-group">
							<label for="">Description</label>
							<input type="text" class="form-control" name="title">
						</div>
						<div class="form-group">
							<label for="">Date</label>
							<input type="date" class="form-control" name="date_transaction">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Search</button>
						</div>
					</div>
				</div>
				
			</form>
		</div> -->
	</div>
	@endif

	<!-- Display Validation Errors -->
    @include('common.errors')
	<div class="row">
		<div class="col col-md-6">
			<form method="POST" action="/create/booking">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="">Amount</label>
					<input type="number" name="amount" step="0.01" class="form-control">
				</div>

				<div class="form-group">
					<label for="">Description</label>
					<textarea name="title" class="form-control"></textarea>
				</div>

				<div class="form-group">
					<label for="">Category</label>
					<select name="parent_category" id="" class="form-control">
						<option value="">Food</option>
						<option value="">Bill</option>
						<option value="">Transportation</option>
					</select>
				</div>

				<div class="form-group">
					<label for="">Date</label>
					<input name="date_transaction" type="date" class="form-control">
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">Add Booking</button>
				</div>
				
			</form>	
		</div>
	</div>
	
</div>	
@stop