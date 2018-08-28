@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Product</h2>
  </div>
</div>
<div class="container">
	<div class="row">
		<div class="offset-3 col-6">
			<div class="card">
				<div class="card-header">
					<a href="{{ url('products') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Back</a>
					<h5 class="pull-right"> Fill the Form</h5>
				</div>
					<div class="card-body"> 
					{{ Form::open(['route'=>'products.store','method'=>'post']) }}
						<!-- <div class="form-group">
							<label>Products ID</label>
							<input type="text" class="form-control" name="id" placeholder="type something" required> 
						</div> -->
						<div class="form-group">
							<label>Supplier</label>
							<select class="form-control select2" name="supplier_id">
								@foreach ($suppliers as $s => $supplier)
								<option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
								@endforeach
							</select>
						</div> 
						<div class="form-group">
							<label>Sub Category</label>
							<select class="form-control select2" name="sub_category_id">
								@foreach ($subcategories as $sc => $subcategory)
								<option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
								@endforeach
							</select>
						</div> 
						<div class="form-group">
							<label>Where do you want to sell ?</label>
							<select class="form-control select2" name="city_id">
								@foreach ($cities as $city)
								<option value="{{ $city->id }}">{{ $city->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label>Quantity</label>
							<input type="text" class="form-control" name="quantity" placeholder="type something" required> 
						</div>
						<div class="form-group">
							<label>Price</label>
							<input type="text" class="form-control" name="price" placeholder="type something" required> 
						</div> 
						<div class="form-group">
							<label>Stock</label>
							<input type="text" class="form-control" name="stock" placeholder="type something" required> 
						</div> 
						<div class="form-group">
							<label>Weight</label>
							<input type="text" class="form-control" name="weight" placeholder="type something" required> 
						</div> 
						<button type="submit" class="btn btn-dark pull-right"><i class="fa fa-check"></i> Submit</button> 
					{{ Form::close() }}
				</div>
				</div>
			</div>
		</div>
	</div>
@endsection