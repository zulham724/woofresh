@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Grup</h2>
  </div>
</div>

<section>
	
<div class="container">
	{{ Form::open(['route'=>'groups.store','method'=>'post','files'=>true]) }}
	<div class="row">
		<div class="col-6">
			<div class="card">
				<div class="card-header">
					<a href="{{ url('groups') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Kembali</a>
					<h5 class="pull-right"> Isi Data Berikut</h5>
				</div>
				<div class="card-body"> 
						<div class="form-group">
							<label>Nama</label>
							<input type="text" class="form-control" name="name" placeholder="tulis disini" required> 
						</div> 
						<div class="form-group">
							<label>Unggah Gambar</label>
							{{ Form::file('image',['class'=>'form-control','required'=>true])}}
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
									<label>Nama Grup di {{$language->name}}</label>
									<input type="text" class="form-control" name="languages[{{$l}}][name]" placeholder="Type something" required>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	{{ Form::close() }}
</div>
	
</section>
@endsection