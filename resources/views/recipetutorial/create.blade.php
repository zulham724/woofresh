@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Tutorial Resep </h2>
  </div>
</div>

<section>
	
<div class="container">
	<div class="row">
		<div class="offset-3 col-6">
			<div class="card">
				<div class="card-header">
					<a href="{{ url('recipetutorials') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Kembali</a>
					<h5 class="pull-right"> Isi Data Berikut </h5>
				</div>
				<div class="card-body"> 
					{{ Form::open(['route'=>['recipetutorials.store'],'method'=>'post','files'=>true]) }}
						<div class="form-group">
							<label>ID Resep</label>
							<select class="form-control select2" name="recipe_id" required>
								<option>--select--</option>
								@foreach ($recipes as $recipe)
									<option value="{{ $recipe->id }}">{{ $recipe->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label>Nama</label>
							<input type="text" name="name" class="form-control" placeholder="tulis disini">
						</div>
						<div class="form-group">
							<label>Deskripsi</label>
							<textarea name="description" class="form-control" placeholder="tulis disini"></textarea>
						</div>
						<button type="submit" class="btn btn-dark pull-right"><i class="fa fa-check"></i> Simpan</button> 
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
</div>
	
</section>
@endsection