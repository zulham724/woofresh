@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Voucher</h2>
  </div>
</div>

<section>
	
<div class="container">
	<div class="row">
		<div class="offset-3 col-6">
			<div class="card">
				<div class="card-header">
					<a href="{{ url('groups') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Kembali</a>
					<h5 class="pull-right"> Isi Data Berikut</h5>
				</div>
				<div class="card-body"> 
					{{ Form::open(['route'=>['vouchers.update',$voucher->id],'method'=>'patch','files'=>true]) }}
					<div class="form-group">
						<label>Nama</label>
						<input type="text" class="form-control" value="{{ $voucher->name }}" name="name" placeholder="tulis disini" required> 
					</div>
					<div class="form-group">
							<label>Gambar</label>
							{{ Form::file('image',['class'=>'form-control'])}}
					</div> 
					<div class="form-group">
						<label>Kode</label>
						<input type="number" class="form-control" value="{{ $voucher->code }}" name="code" placeholder="tulis disini" required> 
					</div> 
					<div class="form-group">
						<label>Deskripsi</label>
						<input type="text" class="form-control" value="{{ $voucher->description }}" name="description" placeholder="tulis disini" required> 
					</div> 
					<div class="form-group">
						<label>Nilai</label>
						<input type="number" class="form-control" value="{{ $voucher->value }}" name="value" placeholder="tulis disini" required>
					</div>
					<div class="form-group">
						<label>Persen</label>
						<input type="number" class="form-control" value="{{ $voucher->percent }}" name="percent" placeholder="tulis disini" required>
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