@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Grup</h2>
  </div>
</div>

<section>
	
<div class="container">
	<div class="row">
		<div class="offset-3 col-6">
			<div class="card">
				<div class="card-header">
					<a href="{{ url('categories') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Kembali</a>
					<h5 class="pull-right"> Isi Data Berikut</h5>
				</div>
				<div class="card-body"> 
					{{ Form::open(['route'=>['categories.update',$category->id],'method'=>'patch','files'=>true]) }}
						<div class="form-group">
						<label>ID Grup</label>
						<select class="form-control" name="group_id">
							@foreach ($groups as $g => $group)
							<option value="{{ $group->id }}">{{ $group->name }}</option>
							@endforeach
						</select>
					</div> 
					<div class="form-group">
						<label>Nama</label>
						<input type="text" class="form-control" value="{{ $category->name }}" name="name" placeholder="tulis disini" required> 
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