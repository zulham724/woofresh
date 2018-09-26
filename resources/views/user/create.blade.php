@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Pengguna</h2>
  </div>
</div>

<section>
	
<div class="container">
	{{ Form::open(['route'=>'users.store','method'=>'post','files'=>true]) }}
	<div class="row">
		<div class="col-4">
			<div class="card">
				<div class="card-header">
					<a href="{{ url('users') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Kembali</a>
					<h5 class="pull-right"> Isi Data Berikut </h5>
				</div>
				<div class="card-body"> 
					<div class="form-group">
						<img src="{{ asset('storage/uploads/avatars/default.png') }}" class="rounded mx-auto d-block" width="150">
						<input type="file" name="avatar" class="form-control">
					</div>
				</div>
			</div>
		</div>
		<div class="col-8">
			<div class="card">
				<div class="card-header">
					<h5 class="pull-right"> Form Biodata</h5>
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
						<label>Negara</label>
						<select class="form-control" name="state_id">
							@foreach ($states as $s => $state)
							<option value="{{ $state->id }}">{{ $state->name }}</option>
							@endforeach
						</select>
					</div> 
					<div class="form-group">
						<label>Kota</label>
						<select class="form-control" name="city_id">
							@foreach ($cities as $s => $city)
							<option value="{{ $city->id }}">{{ $city->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Kecamatan</label>
						<select class="form-control" name="subdistrict_id">
							@foreach ($subdistricts as $s => $subdistrict)
							<option value="{{ $subdistrict->id }}">{{ $subdistrict->name }}</option>
							@endforeach
						</select>
					</div> 
					<div class="form-group">
						<label>Nama</label>
						<input type="text" class="form-control" name="name" placeholder="tulis disini" required> 
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" name="email" placeholder="tulis disini" required> 
					</div> 
					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" name="password" placeholder="tulis disini" required> 
					</div> 
					<div class="form-group">
						<label>Nama Depan</label>
						<input type="text" class="form-control" name="first_name" placeholder="tulis disini" required>
					</div>
					<div class="form-group">
						<label>Nama Belakang</label>
						<input type="text" class="form-control" name="last_name" placeholder="tulis disini" required>
					</div>			
					<div class="form-group">
						<label>Alamat</label>
						<input type="text" class="form-control" name="address" placeholder="tulis disini" required>
					</div>
					<div class="form-group">
						<label>No Telepon</label>
						<input type="number" class="form-control" name="phone_number" placeholder="tulis disini" required>
					</div>
					<button type="submit" class="btn btn-dark pull-right"><i class="fa fa-check"></i> Simpan</button> 
				</div>
			</div>
		</div>
	</div>
	{{ Form::close() }}
</div>
	
</section>
@endsection