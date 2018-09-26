@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Pemasok</h2>
  </div>
</div>

<section>
	
<div class="container">
	<div class="row">
		<div class="offset-3 col-6">
			<div class="card">
				<div class="card-header">
					<a href="{{ url('suppliers') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Kembali</a>
					<h5 class="pull-right"> Isi Data Berikut</h5>
				</div>
				<div class="card-body"> 
					{{ Form::open(['route'=>['suppliers.update',$supplier->id],'method'=>'patch']) }}
						<div class="form-group">
						<label>Nama</label>
						<input type="text" class="form-control" value="{{ $supplier->name }}" name="name" placeholder="tulis disini" required> 
					</div> 
					<div class="form-group">
						<label>Deskripsi</label>
						<textarea type="text" class="form-control" value="{{ $supplier->description }}" name="description" placeholder="tulis disini" required> </textarea>
					</div>
					<div class="form-group">
						<label>Nama Depan</label>
						<input type="text" class="form-control" value="{{ $supplier->contact_first_name }}" name="contact_first_name" placeholder="tulis disini" required> 
					</div> 
					<div class="form-group">
						<label>Nama Belakang</label>
						<input type="text" class="form-control" value="{{ $supplier->contact_last_name }}" name="contact_last_name" placeholder="tulis disini" required> 
					</div> 
					<div class="form-group">
						<label>Judul Kontak</label>
						<input type="text" class="form-control" value="{{ $supplier->contact_title }}" name="contact_title" placeholder="tulis disini" required> 
					</div>  
					<div class="form-group">
						<label>Alamat</label>
						<input type="text" class="form-control" value="{{ $supplier->address_detail }}" name="address_detail" placeholder="tulis disini" required> 
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" class="form-control" value="{{ $supplier->email }}" name="email" placeholder="tulis disini" required> 
					</div> 
					<div class="form-group">
						<label>No Telepon</label>
						<input type="number" class="form-control" value="{{ $supplier->phone_number }}" name="phone_number" placeholder="tulis disini" required> 
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