@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Ingredients</h2>
  </div>
</div>
<section>
<div class="container">
	{{ Form::open(['route'=>['ingredients.store'],'method'=>'post']) }}
	<div class="row">
		<div class="offset-3 col-6">
			<div class="card">
				<div class="card-header">
					<a href="{{ url('ingredients') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Back</a>
					<h5 class="pull-right"> Fill the Form</h5>
				</div>
				<div class="card-body"> 
					<div class="form-group">
						<label>Recipe</label>
						<select class="form-control select2" name="recipe_id">
							@foreach ($recipes as $rec => $recipe)
							<option value="{{ $recipe->id }}">{{ $recipe->name }}</option>
							@endforeach
						</select>
					</div>  
					<div class="form-group">
						<label>Product</label>
						<select class="form-control select2" name="product_id">
							@foreach ($products as $product)
							<option value="{{ $product->id }}">{{ $product->product_translations [0]->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Optional Product</label>
						<input type="text" class="form-control" name="optional_product" placeholder="type something">
					</div> 
					<div class="form-group">
						<label>Weight</label>
						<input type="number" class="form-control" name="weight" placeholder="type something">
					</div> 
					<div class="form-group">
						<label>Unit</label>
						<input type="text" class="form-control" name="unit" placeholder="type something">
					</div> 
					<button type="submit" class="btn btn-dark pull-right"><i class="fa fa-check"></i> Submit</button> 					
				</div>
			</div>
		</div>
	</div>
	{{ Form::close() }}
</div>
</section>
@endsection