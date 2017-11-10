@extends('dashboard_master')

@section('content')
	@foreach($result as $client_detail)
		<div class="panel panel-default col-sm-4 col-sm-offset-4">
		  <!-- Default panel contents -->
			  <div class="panel-heading"> 
			  	<b> {{ strtoupper($client_detail['name']) }} </b>
			  </div>
			  <div class="panel-body">
			  	Gender:
			  	<p> <b> {{ strtoupper($client_detail['gender']) }} </b> </p>

			  	DOB:
			  	<p> <b> {{ date('d-M-Y', strtotime($client_detail['dob'])) }} </b> </p>

			  	Nationality:
			  	<p> <b> {{ strtoupper($client_detail['nationality']) }} </b> </p>

			  	Address:
			    <p> <b> {{ $client_detail['address'] }} </b> </p>

			    Education:
			  	<p> <b> {{ strtoupper($client_detail['education']) }} </b> </p>
			  </div>

			  <!-- List group -->
			  <ul class="list-group">
			    <li class="list-group-item">
			    	Phone:
			    	<p> <b> {{ $client_detail['phone'] }} </b> </p>
			    </li>
			    <li class="list-group-item">
			    	Email:
			    	<p> <b> {{ $client_detail['email'] }} </b> </p>
			    </li>
			    <li class="list-group-item">
			    	Preferred Mode of Contact:
			    	<p> <b> {{ strtoupper($client_detail['preferred_contact_mode']) }} </b> </p>
			    </li>
			  </ul>
		</div>

		<div class="col-sm-4 col-sm-offset-4">
			<a href="{{ route('clients.index') }}" class="btn btn-primary btn-block" >Back</a>
		</div>
	@endforeach
@endsection
