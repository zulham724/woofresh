@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Kecamatan</h2>
  </div>
</div>

<section>
	
<div class="container">
	<div class="row">
		<div class="col-6">
			<div class="card">
				<div class="card-header">
					<a href="{{ route('subdistricts.index') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Kembali</a>
					<h5 class="pull-right"> Isi Data Berikut</h5>
				</div>
				<div class="card-body"> 
					{{ Form::open(['route'=>['subdistricts.store'],'method'=>'post','files'=>true]) }}
						<div class="form-group">
							<label>ID Kota</label>
							<select class="form-control select2" name="city_id" required>
								<option>--pilih--</option>
								@foreach ($cities as $city)
									<option value="{{ $city->id }}">{{ $city->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label>Nama</label>
							<input type="text" class="form-control" name="name" placeholder="tulis disini" required>
						</div>
						<button type="submit" class="btn btn-dark pull-right"><i class="fa fa-check"></i> Simpan</button> 
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	
</section>
@endsection