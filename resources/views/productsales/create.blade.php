@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Product Sale</h2>
  </div>
</div>

<section>
	
<div class="container">
	{{ Form::open(['route'=>'productsales.store','method'=>'post']) }}
	<div class="row">
		<div class=" offset-3 col-6">
			<div class="card">
				<div class="card-header">
					<a href="{{ url('productsales') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Back</a>
					<h5 class="pull-right"> Fill the Form</h5>
				</div>
				<div class="card-body"> 
					<div class="form-group">
						<label>Product </label>
						<select class="form-control select2" name="product_id">
							@foreach ($products as $p => $product)
							<option value="{{ $product->id }}">{{ $product->name }}</option>
							@endforeach
						</select>
					</div> 
					<div class="form-group">
						<label>State </label>
						<select class="form-control select2" name="state_id">
							@foreach ($states as $s => $state)
							<option value="{{ $state->id }}">{{ $state->name }}</option>
							@endforeach
						</select>
					</div> 
					<div class="form-group">
						<label>City </label>
						<select class="form-control select2" name="city_id">
							@foreach ($cities as $c => $city)
							<option value="{{ $city->id }}">{{ $city->name }}</option>
							@endforeach
						</select>
					</div> 
					<div class="form-group">
						<label>Subdistrict </label>
						<select class="form-control select2" name="subdistrict_id">
							@foreach ($subdistricts as $sd => $subdistrict)
							<option value="{{ $subdistrict->id }}">{{ $subdistrict->name }}</option>
							@endforeach
						</select>
					</div> 
					<div class="form-group">
						<label>Quantity</label>
						<input type="text" class="form-control" name="quantity" placeholder="type something" required> 
					</div>
					<div class="form-group">
						<label>Stok</label>
						<input type="text" class="form-control" name="stock" placeholder="type something" required> 
					</div>
					<div class="form-group">
						<label>Price</label>
						<input type="text" class="form-control" name="price" placeholder="type something" required> 
					</div>
					<div class="form-group">
						<label>Discount</label>
						<input type="text" class="form-control" name="discount" placeholder="type something" required> 
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