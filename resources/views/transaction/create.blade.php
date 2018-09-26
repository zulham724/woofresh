@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom"> Transaksi</h2>
  </div>
</div>

<section>
<div class="container">
	<div class="row">
		<div class="col-6">
			<div class="card">
				<div class="card-header">
					<a href="{{ route('transactions.index') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Kembali</a>
					<h5 class="pull-right"> Isi Data Berikut</h5>
				</div>
				<div class="card-body"> 
					{{ Form::open(['route'=>['transactions.store'],'method'=>'post','files'=>true]) }}
						<div class="form-group">
							<label>Pengguna</label>
							<select class="form-control select2" name="user_id">
								@foreach ($users as $u => $user)
								<option value="{{ $user->id }}">{{ $user->name }}</option>
								@endforeach
							</select>
						</div> 
						<div class="form-group">
							<label>ID Voucher</label>
							<select class="form-control select2" name="voucher_id">
								@foreach ($vouchers as $v => $voucher)
								<option value="{{ $voucher->id }}">{{ $voucher->name }}</option>
								@endforeach
							</select>
						</div> 
						<div class="form-group">
							<label>ID Pengiriman</label>
							<select class="form-control select2" name="delivery_fee_id">
								@foreach ($deliveryfees as $d => $deliveryfee)
								<option value="{{ $deliveryfee->id }}">{{ $deliveryfee->name }}</option>
								@endforeach
							</select>
						</div> 
						<div class="form-group">
							<label>No Transaksi</label>
							<input type="number" class="form-control" name="transaction_number" placeholder="tulis disini" required> 
						</div> 
						<div class="form-group">
							<label>No Transaksi</label>
							<input type="number" class="form-control" name="transaction_number" placeholder="tulis disini" required> 
						</div> 
						<div class="form-group">
							<label>Jenis Pembayaran</label>
							<input type="number" class="form-control" name="payment_type" placeholder="tulis disini" required> 
						</div>
						<button type="submit" class="btn btn-dark pull-right"><i class="fa fa-check"></i> Simpan</button> 
					{{ Form::close() }}
				</div>
			</div>
		</div>
		<div class="col-6">
			<div class="card">
				<div class="card-header">
					Shipping Address
				</div>
				<div class="card-body">
					<div class="form-group">
						<label>Transaction ID</label>
						<input type="number" class="form-control" name="transaction_id" placeholder="tulis disini" required> 
					</div>
					<div class="form-group">
						<label>State ID</label>
						<select class="form-control select2" name="state_id">
							@foreach ($states as $s => $state)
								<option value="{{ $state->id }}">{{ $state->name }}</option>
							@endforeach
						</select>
						</div> 
					<div class="form-group">
						<label>City ID</label>
						<select class="form-control select2" name="city_id">
							@foreach ($cities as $c => $city)
							<option value="{{ $city->id }}">{{ $city->name }}</option>
							@endforeach
						</select>
						</div> 
					<div class="form-group">
						<label>Subdistrict ID</label>
						<select class="form-control select2" name="subdistrict_id">
							@foreach ($subdistricts as $sd => $subdistrict)
							<option value="{{ $subdistrict->id }}">{{ $subdistrict->name }}</option>
							@endforeach
						</select>
						</div> 
					<div class="form-group">
						<label>Address Detail</label>
						<input type="number" class="form-control" name="address_detail" placeholder="tulis disini" required> 
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
@endsection