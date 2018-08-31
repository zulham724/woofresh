@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Users</h2>
  </div>
</div>

<section>
	
<div class="container">
	{{ Form::open(['route'=>'users.store','method'=>'post']) }}
	<div class="row">
		<div class="col-6">
			<div class="card">
				<div class="card-header">
					<a href="{{ url('users') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Back</a>
					<h5 class="pull-right"> Fill the Form</h5>
				</div>
				<div class="card-body"> 
						<div class="form-group">
							<label>Role</label>
							<select class="form-control" name="role_id">
								@foreach ($roles as $l => $role)
								<option value="{{ $role->id }}">{{ $role->name }}</option>
								@endforeach
							</select>
						</div> 
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" name="name" placeholder="type something" required> 
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" name="email" placeholder="type something" required> 
						</div> 
						<div class="form-group">
							<label>Password</label>
							<input type="password" class="form-control" name="password" placeholder="type something" required> 
						</div> 
						<button type="submit" class="btn btn-dark pull-right"><i class="fa fa-check"></i> Submit</button> 
				</div>
			</div>
		</div>
		<div class="col-6">
			<div class="card">
				<div class="card-header">
					<h5 class="pull-right">Biodata Form</h5>
				</div>
				<div class="card-body">
					<div class="form-group">
						<label>First name</label>
						<input type="text" class="form-control" name="first_name" placeholder="type something" required>
					</div>
					<div class="form-group">
						<label>Last name</label>
						<input type="text" class="form-control" name="last_name" placeholder="type something" required>
					</div>			
					<div class="form-group">
						<label>Address</label>
						<input type="text" class="form-control" name="address" placeholder="type something" required>
					</div>
					<div class="form-group">
						<label>Phone number</label>
						<input type="number" class="form-control" name="phone_number" placeholder="type something" required>
					</div>
				</div>
			</div>
		</div>
	</div>
	{{ Form::close() }}
</div>
	
</section>
@endsection