@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Komponen</h2>
  </div>
</div>
<div class="container">
	{{ Form::open(['route'=>['components.store'],'method'=>'post']) }}
	<div class="row">
		<div class="offset-3 col-6">
			<div class="card">
				<div class="card-header">
					<a href="{{ url('components') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Kembali</a>
					<h5 class="pull-right"> Isi Data Berikut</h5>
				</div>
				<div class="card-body"> 
					<div class="form-group">
						<label>Produk</label>
						<select class="form-control select2" name="product_id">
							<option value="">Pilih</option>
							@foreach ($products as $p => $product)
							<option value="{{ $product->id }}">{{ $product->product_translations[0]->name }}</option>
							@endforeach
						</select>
					</div> 
					<div class="form-group">
						<label>Daftar Komponen</label>
						<select class="form-control select2" name="component_list_id">
							<option value="">Pilih</option>
							@foreach ($componentlists as  $componentlist)
							<option value="{{ $componentlist->id }}">{{ $componentlist->name }}</option>
							@endforeach
						</select>
					</div>  
					<div class="form-group">
							<label>Satuan</label>
							<input type="text" class="form-control" name="unit" placeholder="tulis disini" required> 
						</div> 
						<div class="form-group">
							<label>Nilai</label>
							<input type="number" class="form-control" name="value" placeholder="tulis disini" required> 
						</div> 
					<button type="submit" class="btn btn-dark pull-right"><i class="fa fa-check"></i> Simpan</button> 					
				</div>
			</div>
		</div>
	</div>
	{{ Form::close() }}
</div>
@endsection