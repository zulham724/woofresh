@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Product</h2>
  </div>
</div>

<section>
	
<div class="container">
	{{ Form::open(['route'=>'products.store','method'=>'post']) }}
	<div class="row">
		<div class=" col-6">
			<div class="card">
				<div class="card-header">
					<a href="{{ url('products') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Back</a>
					<h5 class="pull-right"> Fill the Form</h5>
				</div>
				<div class="card-body"> 
					<div class="form-group">
						<label>Supplier</label>
						<select class="form-control select2" name="supplier_id">
							@foreach ($suppliers as $s => $supplier)
							<option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
							@endforeach
						</select>
					</div> 
						<div class="form-group">
						<label>Group ID</label>
						<select class="form-control select2" name="group_id">
							@foreach ($groups as $g => $group)
							<option value="{{ $group->id }}">{{ $group->name }}</option>
							@endforeach
						</select>
					</div> 
					<div class="form-group">
						<label>Category ID</label>
						<select class="form-control select2" name="category_id">
							@foreach ($categories as $ca => $category)
							<option value="{{ $category->id }}">{{ $category->name }}</option>
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
						<label>Name</label>
						<input type="text" class="form-control" name="name" placeholder="type something" required> 
					</div>
					<div class="form-group">
						<label>Description</label>
						<input type="text" class="form-control" name="description" placeholder="type something" required> 
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
					<div class="form-group">
						<label>Unit</label>
						<input type="text" class="form-control" name="unit" placeholder="type something" required> 
					</div> 
					<div class="form-group">
						<label>Discount</label>
						<input type="text" class="form-control" name="discount" placeholder="type something" required> 
					</div> 
					<div class="form-group">
						<label>Badge</label>
						<input type="text" class="form-control" name="badge" placeholder="type something" required> 
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
						@foreach ($languages as $l => $language)
							<li class="nav-item">
						  		<a class="nav-link {{$l==0 ? 'active':null}}" data-toggle="tab" href="#{{$language->name}}">{{ $language->name }}</a>
							</li>
						@endforeach
					</ul>
					<div class="tab-content">
						@foreach ($languages as $l => $language)
							<div id="{{$language->name}}" class="tab-pane {{$l==0 ? 'active':null}}">
								<input type="hidden" name="languages[{{$l}}][language_id]" value="{{$language->id}}">
								<div class="form-group">
									<label>Product Name in {{$language->name}}</label>
									<input type="text" class="form-control" name="languages[{{$l}}][name]" placeholder="Type something" required>
								</div>
								<div class="form-group">
									<label>Product Description in {{$language->name}}</label>
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
	
</section>
@endsection