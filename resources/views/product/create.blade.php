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
	<div class="alert alert-info">
	  <strong>Info!</strong> Harap mengisi semua form yang ada dibawah, dari form produk lalu mengisi bahasa dari produk tersebut lalu mengisi harga di tiap daerah yang akan dijual.
	</div>
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
							<option value="">Choose one</option>
							@foreach ($suppliers as $s => $supplier)
							<option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
							@endforeach
						</select>
					</div> 
						<div class="form-group">
						<label>Group ID</label>
						<select class="form-control select2" name="group_id">
							<option value="">Choose one</option>
							@foreach ($groups as $g => $group)
							<option value="{{ $group->id }}">{{ $group->name }}</option>
							@endforeach
						</select>
					</div> 
					<div class="form-group">
						<label>Category ID</label>
						<select class="form-control select2" name="category_id">
							<option value="">Choose one</option>
							@foreach ($categories as $ca => $category)
							<option value="{{ $category->id }}">{{ $category->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Sub Category</label>
						<select class="form-control select2" name="sub_category_id">
							<option value="">Choose one</option>
							@foreach ($subcategories as $sc => $subcategory)
							<option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Quantity</label>
						<input type="number" class="form-control" name="quantity" placeholder="type something" required value="0"> 
					</div>
					<div class="form-group">
						<label>Weight</label>
						<input type="number" class="form-control" name="weight" placeholder="type something" required value="0"> 
					</div> 
					<div class="form-group">
						<label>Unit</label>
						<input type="text" class="form-control" name="unit" required placeholder="kg/ml/g"> 
					</div>  
					<div class="form-group">
						<label>Badge</label>
						<input type="text" class="form-control" name="badge" required placeholder="Local / Impor"> 
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

	<div class="alert alert-info">
	  <strong>Info!</strong> Tentukan Nutrisi Barang anda.
	</div>

	<div class="row">
		@foreach ($component_lists as $cl => $component_list)	
		<div class="col-4">
			<div class="card">
				<div class="card-header">
					Nutrisi {{ $component_list->name }} <br>
					<small>{{ $component_list->description }}</small>
				</div>
				<div class="card-body">
					<input type="hidden" name="components[{{$cl}}][component_list_id]" value="{{ $component_list->id }}">
					<div class="form-group">
						<label>Unit</label>
						<input type="text" class="form-control" name="components[{{$cl}}][unit]" placeholder="ml/g/kg">
					</div>
					<div class="form-group">
						<label>Value</label>
						<input type="number" class="form-control" name="components[{{$cl}}][value]" placeholder="Type Something">
					</div>
				</div>
			</div>
		</div>	
		@endforeach
	</div>

	<div class="alert alert-info">
	  <strong>Info!</strong> Tentukan Penjualan Barang anda.
	</div>

	<div class="row">
		@foreach ($states as $s => $state)	
		<div class="col-4">
			<div class="card">
				<div class="card-header">
					Harga di {{ $state->name }}
				</div>
				<div class="card-body">
					<input type="hidden" name="sales[{{$s}}][state_id]" value="{{$state->id}}">
					<div class="form-group">
						<label>Stock</label>
						<input type="number" class="form-control" placeholder="type something" name="sales[{{$s}}][stock]" required value="0">
					</div>
					<div class="form-group">
						<label>Price</label>
						<input type="number" class="form-control" placeholder="type something" name="sales[{{$s}}][price]" required value="0">
					</div>
					<div class="form-group">
						<label>Discount</label>
						<input type="number" class="form-control" placeholder="type something" name="sales[{{$s}}][discount]" required value="0">
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
	{{ Form::close() }}
</div>
	
</section>
@endsection