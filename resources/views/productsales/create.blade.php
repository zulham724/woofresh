@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Penjualan Produk</h2>
  </div>
</div>

<section>
	
<div class="container">
	{{ Form::open(['route'=>'productsales.store','method'=>'post']) }}
	<div class="row">
		<div class=" offset-3 col-6">
			<div class="card">
				<div class="card-header">
					<a href="{{ url('productsales') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Kembali</a>
					<h5 class="pull-right"> Isi Data Berikut</h5>
				</div>
				<div class="card-body"> 
					<div class="form-group">
						<label>Produk </label>
						<select class="form-control select2" name="product_id">
							<option value="">Pilih</option>
							@foreach ($products as $p => $product)
							<option value="{{ $product->id }}">{{ $product->product_translations[0]->name }}</option>
							@endforeach
						</select>
					</div> 
					<div class="form-group">
						<label>Negara </label>
						<select class="form-control select2" name="state_id">
							@foreach ($states as $s => $state)
							<option value="{{ $state->id }}">{{ $state->name }}</option>
							@endforeach
						</select>
					</div> 
					<div class="form-group">
						<label>Kota </label>
						<select class="form-control select2" name="city_id">
							@foreach ($cities as $c => $city)
							<option value="{{ $city->id }}">{{ $city->name }}</option>
							@endforeach
						</select>
					</div> 
					<div class="form-group">
						<label>Kecamatan </label>
						<select class="form-control select2" name="subdistrict_id">
							@foreach ($subdistricts as $sd => $subdistrict)
							<option value="{{ $subdistrict->id }}">{{ $subdistrict->name }}</option>
							@endforeach
						</select>
					</div> 
					<div class="form-group">
						<label>Stok</label>
						<input type="text" class="form-control" name="stocks" placeholder="type something" required> 
					</div>
					<div class="form-group">
						<label>Harga</label>
						<input type="text" class="form-control" name="price" placeholder="type something" required> 
					</div>
					<div class="form-group">
						<label>Diskon</label>
						<input type="text" class="form-control" name="discount" placeholder="type something" required> 
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