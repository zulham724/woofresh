@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Language</h2>
  </div>
</div>

<section>
	
<div class="container">
	<div class="row">
		<div class="offset-3 col-6">
			<div class="card">
				<div class="card-header">
					<a href="{{ url('languages') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Back</a>
					<h5 class="pull-right"> Show</h5>
				</div>
				<div class="card-body text-center"> 
					{{ Form::open(['route'=>'languages.store','method'=>'post','files'=>true]) }}
						<div class="form-group">
							<img src="{{ asset('storage/'.$language->image) }}" class="img img-thumbnail" width="100">
						</div>
						<div class="form-group">
							<h3>{{ $language->name }}</h3>
						</div> 
						<button type="submit" class="btn btn-dark pull-right"><i class="fa fa-check"></i> Submit</button> 
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
</div>
	
</section>
@endsection