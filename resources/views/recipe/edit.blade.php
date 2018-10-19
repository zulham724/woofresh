@extends('layouts.admin')
@section('content')
<div class="page-header">
	<div class="container-fluid">
		<h2 class="h5 no-margin-bottom">Resep</h2>
	</div>
</div>

<section>
	
	<div class="container">
		{{ Form::open(['route'=>['recipes.update',$recipe->id],'method'=>'patch','files'=>true]) }}
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<a href="{{ url('recipes') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Kembali</a>
						<h5 class="pull-right"> Isi Data Berikut</h5>
					</div>
					<div class="card-body"> 
						<div class="form-group">
							<label>ID Pengguna</label>
							<select class="form-control select2" name="user_id" required>
								<option>--select--</option>
								@foreach ($users as $u => $user)
								<option value="{{ $user->id }}" {{ $recipe->user_id == $user->id ? 'selected': null }}>{{ $user->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label>Nama</label>
							<input type="text" class="form-control" value="{{ $recipe->name }}" name="name" placeholder="type something" required>
						</div>
						<div class="form-group">
							<label>Deskripsi</label>
							<textarea type="text" class="form-control" name="description" placeholder="type something">{{ $recipe->description }}</textarea>
						</div>
						<div class="form-group">
							<label>Tingkat Kesulitan</label>
							<select class="form-control rating" name="difficulty_level">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
						</div>
						<div class="form-group">
							<label>Waktu Persiapan</label>
							<input type="number" class="form-control" value="{{ $recipe->preparation_time}}" name="preparation_time" placeholder="How long ?"><p>Minutes</p>
						</div>
						<div class="form-group">
							<label>Porsi per Penyajian</label>
							<input type="number" class="form-control" value="{{ $recipe->portion_per_serve }}" name="portion_per_serve" placeholder="How much ?">
						</div>
						<button type="submit" class="btn btn-dark pull-right"><i class="fa fa-check"></i> Simpan</button> 
					</div>
				</div>
			</div>
		</div>
		<ingredient-component v-bind:edit_ingredients="{{ $recipe->ingredients }}"></ingredient-component>
		<recipetutorial-component v-bind:edit_recipetutorials="{{ $recipe->recipe_tutorials }}"></recipetutorial-component>
		<recipeimage-component v-bind:edit_recipeimages="{{ $recipe->recipe_images }}"></recipeimage-component>
		{{ Form::close() }}
	</div>
	
</section>
@endsection
@section('script')
<script type="text/javascript">
	$('.rating').barrating({
		theme: 'fontawesome-stars-o',
		initialRating:{!! $recipe->difficulty_level !!}
	});
</script>
@endsection