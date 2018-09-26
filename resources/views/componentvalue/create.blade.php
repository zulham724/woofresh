@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Nilai Komponen</h2>
  </div>
</div>

<section>
	
<div class="container">
	{{ Form::open(['route'=>'componentvalues.store','method'=>'post']) }}
	<div class="row">
		<div class=" offset-3 col-6">
			<div class="card">
				<div class="card-header">
					<a href="{{ url('componentvalues') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Kembali</a>
					<h5 class="pull-right"> Isi Data Berikut</h5>
				</div>
				<div class="card-body"> 
					<div class="form-group">
						<label>ID Komponen</label>
						<select class="form-control select2" name="component_id">
							@foreach ($components as $c => $component)
							<option value="{{ $component->id }}">{{ $component->name }}</option>
							@endforeach
						</select>
					</div> 
					<div class="form-group">
						<label>Satuan</label>
						<input type="text" class="form-control" name="unit" placeholder="tulis disini" required> 
					</div>
					<div class="form-group">
						<label>Nilai</label>
						<input type="text" class="form-control" name="value" placeholder="tulis disini" required> 
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