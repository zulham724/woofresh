@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Sub Kategori</h2>
  </div>
</div>

<section>
	
<div class="container">
	<div class="row">
		<div class="offset-3 col-6">
			<div class="card">
				<div class="card-header">
					<a href="{{ url('subcategories') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Kembali</a>
					<h5 class="pull-right"> Isi Data Berikut</h5>
				</div>
				<div class="card-body"> 
					{{ Form::open(['route'=>['subcategories.update',$subcategory->id],'method'=>'patch','files'=>true]) }}
						<div class="form-group">
							<label>ID Kategori</label>
							<select class="form-control" name="category_id">
								@foreach ($categories as $sc => $category)
								<option value="{{ $category->id }}">{{ $category->name }}</option>
								@endforeach
							</select>
						</div> 
						<div class="form-group">
							<label>Nama</label>
							<input type="text" class="form-control" value="{{ $subcategory->name }}" name="name" placeholder="tulis disini" required> 
						</div> 
						<div class="form-group">
							<label>Unggah Gambar</label>
							{{ Form::file('image',['class'=>'form-control'])}} 
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