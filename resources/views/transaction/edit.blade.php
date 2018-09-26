@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Transaksi</h2>
  </div>
</div>

<section>
	
<div class="container">
	<div class="row">
		<div class="offset-3 col-6">
			<div class="card">
				<div class="card-header">
					<a href="{{ url('transactions') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Kembali</a>
					<h5 class="pull-right"> Isi Data Berikut</h5>
				</div>
				<div class="card-body"> 
					{{ Form::open(['route'=>['transactions.update',$transaction->id],'method'=>'patch']) }}
						<div class="form-group">
							<label>Pengguna</label>
							<select class="form-control select2" name="user_id">
								@foreach ($users as $u => $user)
								<option value="{{ $user->id }}">{{ $user->name }}</option>
								@endforeach
							</select>
						</div> 
						<div class="form-group">
							<label>No Transaksi</label>
							<input type="number" value="{{ $transaction->transaction_number }}"  class="form-control" name="transaction_number" placeholder="tulis disini" required> 
						</div> 
						<div class="form-group">
							<label>Jenis Pembayaran</label>
							<input type="number" class="form-control" name="payment_type" value="{{ $transaction->payment_type }}"  placeholder="tulis disini" required> 
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