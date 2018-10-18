@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Konten</h2>
  </div>
</div>

<section>
	
<div class="container">
	{{ Form::open(['route'=>'contentlists.store','method'=>'post','files'=>true]) }}
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<a href="{{ route('contentlists.index') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Kembali</a>
					<h5 class="pull-right"> Isi Data Berikut</h5>
				</div>
				<div class="card-body"> 
						<div class="form-group">
							<label>Kategori Konten</label>
							<input type="text" class="form-control" name="name" placeholder="type something">
						</div>
						<div class="form-group">
							<label>Description</label>
							<textarea class="form-control" placeholder="type something" name="description"></textarea>
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