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
					<a href="{{ url('subcategories') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Back</a>
					<h5 class="pull-right"> Fill the Form</h5>
				</div>
				<div class="card-body"> 
					{{ Form::open(['route'=>['subcategories.update',$subcategory->id],'method'=>'patch','files'=>true]) }}
						<div class="form-group">
							<label>Category ID</label>
							<select class="form-control" name="category_id">
								@foreach ($categories as $sc => $category)
								<option value="{{ $category->id }}">{{ $category->name }}</option>
								@endforeach
							</select>
						</div> 
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" value="{{ $subcategory->name }}" name="name" placeholder="type something" required> 
						</div> 
						<div class="form-group">
							<label>Upload Image</label>
							{{ Form::file('image',['class'=>'form-control','required'=>true])}} 
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