@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Produk</h2>
  </div>
</div>

<section>
	
<div class="container">
	{{ Form::open(['route'=>'products.store','method'=>'post']) }}
	<div class="alert alert-info">
	  <strong>Info!</strong> Harap mengisi semua form yang ada dibawah, dari form produk lalu mengisi bahasa dari produk tersebut lalu mengisi harga di tiap daerah yang akan dijual.
	</div>
	<div class="row">
		<div class=" col-6">
			<div class="card">
				<div class="card-header">
					<a href="{{ url('products') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Kembali</a>
					<h5 class="pull-right"> Isi Data Berikut</h5>
				</div>
				<div class="card-body"> 
					<div class="form-group">
						<label>Pemasok</label>
						<select class="form-control select2" name="supplier_id">
							<option value="">Pilih</option>
							@foreach ($suppliers as $s => $supplier)
							<option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
							@endforeach
						</select>
					</div> 
					<selectgroup-component></selectgroup-component>
					<div class="form-group">
						<label>Kuantitas</label>
						<input type="number" class="form-control" name="quantity" placeholder="tulis disini" required value="0"> 
					</div>
					<div class="form-group">
						<label>Berat</label>
						<input type="number" class="form-control" name="weight" placeholder="tulis disini" required value="0"> 
					</div> 
					<div class="form-group">
						<label>Satuan</label>
						<input type="text" class="form-control" name="unit" required placeholder="kg/ml/g"> 
					</div>  
					<div class="form-group">
						<label>Badge</label>
						<input type="text" class="form-control" name="badge" required placeholder="Lokal / Impor"> 
					</div> 
					<button type="submit" class="btn btn-dark pull-right"><i class="fa fa-check"></i> Simpan</button> 					
				</div>
			</div>
		</div>
		<div class="col-6">
			<div class="card">
				<div class="card-header">
					Bahasa
				</div>
				<div class="card-body">
					<ul class="nav nav-tabs">
						@foreach ($languages as $l => $language)
							<li class="nav-item">
						  		<a class="nav-link {{$l==0 ? 'active':null}}" data-toggle="tab" href="#{{$language->name}}">{{ $language->name }}</a>
							</li>
						@endforeach
					</ul>
					<div class="tab-content">
						@foreach ($languages as $l => $language)
							<div id="{{$language->name}}" class="tab-pane {{$l==0 ? 'active':null}}">
								<input type="hidden" name="languages[{{$l}}][language_id]" value="{{$language->id}}">
								<div class="form-group">
									<label>Nama Produk di {{$language->name}}</label>
									<input type="text" class="form-control" name="languages[{{$l}}][name]" placeholder="tulis disini" required>
								</div>
								<div class="form-group">
									<label>Deskripsi Produk di {{$language->name}}</label>
									<input type="text" class="form-control" name="languages[{{$l}}][description]" placeholder="tulis disini" required>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	<nutrition-component></nutrition-component>

	<div class="alert alert-info">
	  <strong>Info!</strong> Tentukan Penjualan Barang anda.
	</div>

	<div class="row">
		@foreach ($states as $s => $state)	
		<div class="col-4">
			<div class="card">
				<div class="card-header">
					Harga di {{ $state->name }}
				</div>
				<div class="card-body">
					<input type="hidden" name="sales[{{$s}}][state_id]" value="{{$state->id}}">
					<div class="form-group">
						<label>Stok</label>
						<input type="number" class="form-control" placeholder="tulis disini" name="sales[{{$s}}][stock]" required value="0">
					</div>
					<div class="form-group">
						<label>Harga</label>
						<input type="number" class="form-control" placeholder="tulis disini" name="sales[{{$s}}][price]" required value="0">
					</div>
					<div class="form-group">
						<label>Diskon</label>
						<input type="number" class="form-control" placeholder="tulis disini" name="sales[{{$s}}][discount]" required value="0">
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
	{{ Form::close() }}
</div>
	
</section>
@endsection