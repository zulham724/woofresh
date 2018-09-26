@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Gambar Resep</h2>
  </div>
</div>

<section>
	
<div class="container">
	<div class="row">
		<div class="offset-3 col-6">
			<div class="card">
				<div class="card-header">
					<a href="{{ url('recipeimages') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Kembali</a>
					<h5 class="pull-right"> Isi Data Berikut</h5>
				</div>
				<div class="card-body"> 
					{{ Form::open(['route'=>['recipeimages.update',$recipeimage->id],'method'=>'patch','files'=>true]) }}
						<div class="form-group">
							<label>ID Resep</label>
							<select class="form-control select2" name="recipe_id" required>
								<option>--Pilih--</option>
								@foreach ($recipes as $r => $recipe)
									<option value="{{ $recipe->id }}">{{ $recipe->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label>Gambar</label>
							{{ Form::file('image',['class'=>'form-control'])}}
						</div>
						<div class="form-group">
							<label>Deskripsi</label>
							<textarea type="text" class="form-control"  value="{{ $recipeimage->description }}"  name="description" placeholder="tulis disini">
							</textarea>
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