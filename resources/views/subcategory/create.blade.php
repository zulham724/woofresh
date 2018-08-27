@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom"> Sub Categories</h2>
  </div>
</div>
<div class="container">
	<div class="row">
		<div class="offset-3 col-6">
			<div class="card">
				<div class="card-header">
					<a href="{{ url('cities') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Back</a>
					<h5 class="pull-right"> Fill the Form</h5>
				</div>
				<div class="card-body"> 
					{{ Form::open(['route'=>'subcategories.store','method'=>'post']) }}
						<div class="form-group">
							<label>Category ID</label>
							<select class="form-control" name="category_id">
								@foreach ($subcategories as $l => $subcategory)
								<option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
								@endforeach
							</select>
						</div> 
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" name="name" placeholder="type something" required> 
						</div> 
						<button type="submit" class="btn btn-dark pull-right"><i class="fa fa-check"></i> Submit</button> 
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection