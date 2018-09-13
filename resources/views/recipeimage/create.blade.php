@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Recipe</h2>
  </div>
</div>

<section>
	
<div class="container">
	<div class="row">
		<div class="offset-3 col-6">
			<div class="card">
				<div class="card-header">
					<a href="{{ url('recipeimages') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Back</a>
					<h5 class="pull-right"> Fill the Form</h5>
				</div>
				<div class="card-body"> 
					{{ Form::open(['route'=>['recipeimages.store'],'method'=>'post','files'=>true]) }}
						<div class="form-group">
							<label>Recipe ID</label>
							<select class="form-control select2" name="recipe_id" required>
								<option>--select--</option>
								@foreach ($recipes as $recipe)
									<option value="{{ $recipe->id }}">{{ $recipe->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label>Image</label>
							{{ Form::file('image',['class'=>'form-control'])}}
						</div>
						<div class="form-group">
							<label>Description</label>
							<input type="text" class="form-control" name="description" placeholder="type something">
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