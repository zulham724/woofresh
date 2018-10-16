@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Resep</h2>
  </div>
</div>

<section>
	
<div class="container">
	{{ Form::open(['route'=>['recipes.store'],'method'=>'post','files'=>true]) }}
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<a href="{{ route('recipes.index') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Kembali</a>
					<h5 class="pull-right"> Isi Data Berikut</h5>
				</div>
				<div class="card-body"> 
						<div class="form-group">
							<label>ID Pengguna</label>
							<select class="form-control select2" name="order[user_id]" required>
								<option>--select--</option>
								@foreach ($users as $user)
									<option value="{{ $user->id }}">{{ $user->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label>Nama</label>
							<input type="text" class="form-control" name="order[name]" placeholder="tulis disini" required>
						</div>
						<div class="form-group">
							<label>Deskripsi</label>
							<textarea name="order[description]" class="form-control" placeholder="tulis disini"></textarea>
						</div>
						<div class="form-group">
							<label>Tutorial</label>
							<!-- <input type="text" class="form-control" name="tutorial" placeholder="tulis disini"> -->
							<textarea class="form-control" name="order[tutorial]" placeholder="tulis disini"></textarea>
						</div>
						<div class="form-group">
							<label>Tingkat Kesulitan</label>
							<select class="form-control rating" name="order[difficulty_level]">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
						</div>
						<div class="form-group">
							<label>Waktu Persiapan</label>
							<input type="number" class="form-control" name="order[preparation_time]" placeholder="How long ?"><p>Menit</p>
						</div>
						<div class="form-group">
							<label>Porsi per Penyajian</label>
							<input type="number" class="form-control" name="order[portion_per_serve]" placeholder="How much ?">
						</div>
						<button type="submit" class="btn btn-dark pull-right"><i class="fa fa-check"></i> Simpan</button> 
				</div>
			</div>
		</div>
	</div>
	<ingredient-component></ingredient-component>
	<recipetutorial-component></recipetutorial-component>
	<recipeimage-component></recipeimage-component>
	{{ Form::close() }}
</div>
	
</section>
@endsection