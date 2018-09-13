@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Users</h2>
  </div>
</div>

<section>
	
<div class="container">
	<div class="row">
		<div class="col-4">
			<div class="card">
				<div class="card-header">
					<a href="{{ url('users') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Back</a>
					<h5 class="pull-right"> Fill the Form</h5>
				</div>
				<div class="card-body">
					{{ Form::open(['route'=>['users.update',$user->id],'method'=>'patch','files'=>true]) }}
					<div class="form-group">
						<img src="{{ asset($user->avatar != null ? 'storage/'.$user->avatar : 'storage/avatar/default.png') }}" class="rounded mx-auto d-block" width="150">
						<input type="file" name="avatar" class="form-control">
					</div>
				</div>
			</div>
		</div>
		<div class="col-8">
			<div class="card">
				<div class="card-header">
					<h5 class="pull-right">Biodata Form</h5>
				</div>
				<div class="card-body">
					<div class="form-group">
						<label>Role</label>
						<select class="form-control" name="role_id">
							@foreach ($roles as $r => $role)
							<option value="{{ $role->id }}">{{ $role->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>State</label>
						<select class="form-control" name="state_id">
							@foreach ($states as $st => $state)
							<option value="{{ $state->id }}">{{ $state->name }}</option>
							@endforeach
						</select>
					</div> 
					<div class="form-group">
						<label>City</label>
						<select class="form-control" name="city_id">
							@foreach ($cities as $c => $city)
							<option value="{{ $city->id }}">{{ $city->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Sub District</label>
						<select class="form-control" name="subdistrict_id">
							@foreach ($subdistricts as $sd => $subdistrict)
							<option value="{{ $subdistrict->id }}">{{ $subdistrict->name }}</option>
							@endforeach
						</select>
					</div> 
					<div class="form-group">
						<label>Name</label>
						<input type="text" class="form-control" value="{{ $user->name }}"  name="name" placeholder="type something" required> 
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" value="{{ $user->email }}"  name="email" placeholder="type something" required> 
					</div> 
					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" value="{{ $user->password }}"  name="password" placeholder="type something" required> 
					</div> 
					<div class="form-group">
						<label>First name</label>
						<input type="text" class="form-control" value="{{ $user->biodata->first_name ?? 'kosong' }}"  name="first_name" placeholder="type something" required>
					</div>
					<div class="form-group">
						<label>Last name</label>
						<input type="text" class="form-control" value="{{ $user->biodata->last_name ?? 'kosong' }}"  name="last_name" placeholder="type something" required>
					</div>			
					<div class="form-group">
						<label>Address</label>
						<input type="text" class="form-control" value="{{ $user->biodata->address ?? 'kosong' }}"  name="address" placeholder="type something" required>
					</div>
					<div class="form-group">
						<label>Phone number</label>
						<input type="number" class="form-control" value="{{ $user->biodata->phone_number ?? '0' }}"  name="phone_number" placeholder="type something" required>
					</div>
					<button type="submit" class="btn btn-dark pull-right"><i class="fa fa-check"></i> Submit</button> 
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
</div>
	
</section>
@endsection