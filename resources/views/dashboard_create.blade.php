@extends('dashboard_master')


@section('content')

	<div class="row">

		<section class="content">

			<div class="col-md-8 col-md-offset-2">
				  @if (count($errors) > 0)

			        <div class="alert alert-danger">

			            <strong>Whoops!</strong> There were some problems with your input.<br><br>

			            <ul>

			                @foreach ($errors->all() as $error)

			                    <li>{{ $error }}</li>

			                @endforeach

			            </ul>

			        </div>

			    @endif
			    @if(Session::has('success'))
				    <div class="alert alert-info">
				      {{Session::get('success')}}
				    </div>
				@endif

				<div class="panel panel-default">
					<div class="panel-heading">
				    		<h3 class="panel-title col-sm-offset-5">Add a New Client</h3>
				 	</div>

					<div class="panel-body">
			
					
						<div class="table-container">
    						<form method="POST" action="{{ route('clients.store') }}"  role="form">
	    						{{ csrf_field() }}
				    			<div class="row">
				    				<div class="col-xs-4 col-sm-4 col-md-4">
				    					<div class="form-group">
				                			<input type="text" name="name" id="name" class="form-control input-sm" placeholder="Your Full Name please" required>
				    					</div>
				    				</div>
				    				<div class="col-xs-4 col-sm-4 col-md-4">
				    					<div class="form-group">
				                			<select name="gender" id="gender" class="form-control input-sm" required>
				                				<option value=""> Gender here and Date of Birth here --------> </option>
				                				<option value="female"> Female </option>
				                				<option value="male"> Male </option>
				                				<option value="others"> Others </option>
				                			</select>
				    					</div>
				    				</div>
				    				<div class="col-xs-4 col-sm-4 col-md-4">
				    					<div class="form-group">
				    						<input type="date" name="dob" id="dob" class="form-control input-sm" placeholder="Date of Birth" required>
				    					</div>
				    				</div>
				    			</div>

				    			<div class="row">
				    				<div class="col-xs-4 col-sm-4 col-md-4">
				    					<div class="form-group">
				                			<input type="number" name="phone" id="phone" class="form-control input-sm" placeholder="Phone without country code" required>
				    					</div>
				    				</div>
				    				<div class="col-xs-4 col-sm-4 col-md-4">
				    					<div class="form-group">
				                			<input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email please" required>
				    					</div>
				    				</div>
				    				<div class="col-xs-4 col-sm-4 col-md-4">
				    					<div class="form-group">
				    						<input type="text" name="address" id="address" class="form-control input-sm" placeholder="Where do you live" required>
				    					</div>
				    				</div>
				    			</div>

				    			<div class="row">
				    				<div class="col-xs-4 col-sm-4 col-md-4">
				    					<div class="form-group">
				                			<input type="text" name="nationality" id="nationality" class="form-control input-sm" placeholder="Nationality" required>
				    					</div>
				    				</div>
				    				<div class="col-xs-4 col-sm-4 col-md-4">
				    					<div class="form-group">
				                			<input type="text" name="education" id="education" class="form-control input-sm" placeholder="Your Highest Qualification" required>
				    					</div>
				    				</div>
				    				<div class="col-xs-4 col-sm-4 col-md-4">
				    					<div class="form-group">
				    						<select name="preferred_contact_mode" id="preferred_contact_mode" class="form-control input-sm" required>
				                				<option value=""> Preferred contact mode </option>
				                				<option value="email"> Email </option>
				                				<option value="phone"> Phone </option>
				                				<option value="none"> None </option>
				                			</select>
				    					</div>
				    				</div>
				    			</div>

					    		<div class="row">
									<div class="col-xs-6 col-sm-6 col-md-6">
										<input type="submit"  value="Save" class="btn btn-success btn-block">
									</div>	
									<div class="col-xs-6 col-sm-6 col-md-6">
										<a href="{{ route('clients.index') }}" class="btn btn-primary btn-block" >Back</a>
									</div>
							    </div>
			    			</form>
						</div>
					</div>

				</div>
			</div>
		</section>

@endsection