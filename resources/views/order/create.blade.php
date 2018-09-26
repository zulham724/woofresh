@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Pesanan</h2>
  </div>
</div>
<div class="container-fluid">
	{{ Form::open(['route'=>['orders.store'],'method'=>'post']) }}
	<div class="row">
		<div class="offset-3 col-6">
			<div class="card">
				<div class="card-header">
					<a href="{{ url('orders') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Kembali</a>
					<h5 class="pull-right"> Isi Data Berikut</h5>
				</div>
				<div class="card-body"> 
					<div class="form-group">
						<label>Transaksi</label>
						<select class="form-control select2" name="transaction_id">
							@foreach ($transactions as $tr => $transaction)
							<option value="{{ $transaction->id }}">{{ $transaction->id }}</option>
							@endforeach
						</select>
					</div>  
					<div class="form-group">
						<label>Produk</label>
						<select class="form-control select2" name="product_id">
							@foreach ($products as $product)
							<option value="{{ $product->id }}">{{ $product->name }}</option>
							@endforeach
						</select>
					</div> 
					<div class="form-group">
						<label>Kuantitas</label>
						<input type="text" class="form-control" name="quantity" placeholder="tulis disini" required> 
					</div>
					<div class="form-group">
						<label>Sub Total Harga</label>
						<input type="text" class="form-control" name="subtotal_price" placeholder="tulis disini" required> 
					</div>
					<button type="submit" class="btn btn-dark pull-right"><i class="fa fa-check"></i> Simpan</button> 					
				</div>
			</div>
		</div>
	</div>
	{{ Form::close() }}
</div>
@endsection