@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Konten</h2>
  </div>
</div>

<section>
	
<div class="container">
	{{ Form::open(['route'=>['contents.update',$content->id],'method'=>'patch','files'=>true]) }}
	<div class="row">
		<div class="col-6">
			<div class="card">
				<div class="card-header">
					<a href="{{ url('contents') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Kembali</a>
					<h5 class="pull-right"> Isi Data Berikut</h5>
				</div>
				<div class="card-body"> 
						<div class="form-group">
							<label>Nama Konten</label>
							<input type="text" class="form-control" value="{{ $content->name }}" name="name" placeholder="tulis disini" required> 
						</div>
						<img src="{{ asset('storage/'.$content->image) }}" class="img-responsive" width="100">
						<div class="form-group">
							<label>Gambar</label>
							{{ Form::file('image',['class'=>'form-control'])}}
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
						@foreach ($content['content_translations'] as $ct => $content_translation)
							@if($content_translation->language->id == $language->id)
							<div id="{{$language->name}}" class="tab-pane {{$ct==0 ? 'active':null}}">
								<input type="hidden" name="languages[{{$l}}][language_id]" value="{{$content_translation->language->id}}">
								<input type="hidden" name="languages[{{$l}}][id]" value="{{$content_translation->id}}">
								<div class="form-group">
									<label>Nama Konten di {{$content_translation->language->name}}</label>
									<input type="text" value="{{$content_translation->name}}" class="form-control" name="languages[{{$l}}][name]" placeholder="Type something" required>
								</div>
								<div class="form-group">
									<label>Deskripsi Konten di {{$content_translation->language->name}}</label>
									<input type="text" value="{{$content_translation->description}}" class="form-control" name="languages[{{$l}}][description]" placeholder="Type something" required>
								</div>
							</div>
							@endif
						@endforeach
						@if(!isset($content['content_translations'][$l]))
						<div id="{{$language->name}}" class="tab-pane {{$l==0 ? 'active':null}}">
							<input type="hidden" name="languages[{{$l}}][id]" value="0">
							<input type="hidden" name="languages[{{$l}}][language_id]" value="{{$language->id}}">
							<div class="form-group">
								<label>Nama Konten di {{$language->name}}</label>
								<input type="text" class="form-control" name="languages[{{$l}}][name]" placeholder="Type something" required>
							</div>
							<div class="form-group">
								<label>Deskripsi Konten di {{$language->name}}</label>
								<input type="text" class="form-control" name="languages[{{$l}}][description]" placeholder="Type something" required>
							</div>
						</div>
						@endif
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