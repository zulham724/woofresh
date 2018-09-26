@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Gambar Produk</h2>
  </div>
</div>

<section>
	
<div class="container">
	<div class="row">
		<div class="offset-3 col-6">
			<div class="card">
				<div class="card-header">
					<a href="{{ url('productimages') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Kembali</a>
					<h5 class="pull-right"> Isi Data Berikut</h5>
				</div>
				<div class="card-body"> 
					{{ Form::open(['route'=>['productimages.store'],'method'=>'post','files'=>true]) }}
						<div class="form-group">
							<label>ID Produk</label>
							<select class="form-control select2" name="product_id" required>
								<option>--Pilih--</option>
								@foreach ($products as $product)
									<option value="{{ $product->id }}">{{ $product->product_translations[0]->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label>Gambar</label>
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