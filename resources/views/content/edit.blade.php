@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Content</h2>
  </div>
</div>
<div class="container">
	{{ Form::open(['route'=>['contents.update',$content->id],'method'=>'patch','files'=>true]) }}
	<div class="row">
		<div class="col-6">
			<div class="card">
				<div class="card-header">
					<a href="{{ url('contents') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Back</a>
					<h5 class="pull-right"> Fill the Form</h5>
				</div>
				<div class="card-body"> 
						<div class="form-group">
							<label>Content Name</label>
							<input type="text" class="form-control" value="{{ $content->name }}" name="name" placeholder="type something" required> 
						</div>
						<img src="{{ asset('storage/'.$content->image) }}" class="img-responsive" width="100">
						<div class="form-group">
							<label>Image</label>
							{{ Form::file('image',['class'=>'form-control'])}}
						</div> 
						<button type="submit" class="btn btn-dark pull-right"><i class="fa fa-check"></i> Submit</button> 
				</div>
			</div>
		</div>
		<div class="col-6">
			<div class="card">
				<div class="card-header">
					Languages
				</div>
				<div class="card-body">
					<ul class="nav nav-tabs">
						@foreach ($languages as $language)
							<li class="nav-item">
						  		<a class="nav-link" data-toggle="tab" href="#{{$language->name}}">{{ $language->name }}</a>
							</li>
						@endforeach
					</ul>
					<div class="tab-content">
						@foreach ($languages as $l => $language)
						@foreach ($content['content_translations'] as $ct => $content_translation)
							@if($language->id == $content_translation->language->id)
							<div id="{{$content_translation->language->name}}" class="tab-pane fade">
								<input type="hidden" name="languages[{{$ct}}][language_id]" value="{{$content_translation->language->id}}">
								<input type="hidden" name="languages[{{$ct}}][id]" value="{{$content_translation->id}}">
								<div class="form-group">
									<label>Content Name in {{$content_translation->name}}</label>
									<input type="text" value="{{$content_translation->name}}" class="form-control" name="languages[{{$ct}}][name]" placeholder="Type something" required>
								</div>
								<div class="form-group">
									<label>Content Description in {{$content_translation->name}}</label>
									<input type="text" value="{{$content_translation->description}}" class="form-control" name="languages[{{$ct}}][description]" placeholder="Type something" required>
								</div>
							</div>
							@endif
						@endforeach
							<div id="{{$language->name}}" class="tab-pane fade">
								<input type="hidden" name="languages[{{$l}}][language_id]" value="{{$language->id}}">
								<div class="form-group">
									<label>Content Name in {{$language->name}}</label>
									<input type="text" class="form-control" name="languages[{{$l}}][name]" placeholder="Type something" required>
								</div>
								<div class="form-group">
									<label>Content Description in {{$language->name}}</label>
									<input type="text" class="form-control" name="languages[{{$l}}][description]" placeholder="Type something" required>
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
@endsection