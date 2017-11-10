@extends('dashboard_master')

@section('content')

	<div class="row">

		<section class="content">
			
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
					<div class="pull-left"><h3>Client List</h3></div>
						<div class="pull-right">
							<div class="btn-group">
								
								<a href="{{ route('clients.create') }}" class="btn btn-primary" >Add New Client</a>
								
							</div>
						</div>
						<div class="table-container">
			              <table id="mytable" class="table table-bordred table-striped">
			                   
			                   <thead>
			                   		@foreach($title as $t)
			                   			@if ($t != 'client_id')
			                   				<th> {{ strtoupper(str_replace('_', ' ', $t))  }} </th>
		                   				@endif
		                   			@endforeach
			                       
			                   </thead>
							    <tbody>
							    	@foreach($result as $list)
							    		<tr>
								    		<td> {{ $list['name'] }} </td>
								    		<td> {{ $list['gender'] }} </td>
								    		<td> {{ $list['dob'] }} </td>
								    		<td> {{ $list['phone'] }} </td>
								    		<td> {{ $list['email'] }} </td>
								    		<td> {{ $list['address'] }} </td>
								    		<td> {{ $list['nationality'] }} </td>
								    		<td> {{ $list['education'] }} </td>
								    		<td> {{ $list['preferred_contact_mode'] }} </td>
								    	</tr>
							    	@endforeach
							    </tbody>

							    <div class='col-sm-offset-5'>
								    	{{ $result->hasMorePagesWhen($has_more_pages) }}
								</div>
							</table>
						</div>
					</div>

				</div>
			</div>
		</section>
	</div>
@endsection
