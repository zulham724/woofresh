@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Cities</h2>
  </div>
</div>

<section>
	
<div class="container">
	<div class="row">
		<div class="offset-3 col-6">
			<div class="card">
				<div class="card-header">
					<a href="{{ url('cities') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Back</a>
					<h5 class="pull-right"> Fill the Form</h5>
				</div>
				<div class="card-body"> 
					{{ Form::open(['route'=>'cities.store','method'=>'post']) }}
						<div class="form-group">
						<label>State</label>
							<select class="form-control select2" name="state_id">
								@foreach ($states as $st => $state)
								<option value="{{ $state->id }}">{{ $state->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" name="name" placeholder="type something" required> 
						</div>
						<div class="form-group">
							<label>Description</label>
							<textarea type="text" class="form-control" name="description" placeholder="type something" > </textarea>
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