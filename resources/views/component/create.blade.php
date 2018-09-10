@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Components</h2>
  </div>
</div>
<div class="container">
	{{ Form::open(['route'=>['components.store'],'method'=>'post']) }}
	<div class="row">
		<div class="offset-3 col-6">
			<div class="card">
				<div class="card-header">
					<a href="{{ url('components') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Back</a>
					<h5 class="pull-right"> Fill the Form</h5>
				</div>
				<div class="card-body"> 
					<div class="form-group">
						<label>Product</label>
						<select class="form-control select2" name="product_id">
							<option value="">Choose one</option>
							@foreach ($products as $product)
							<option value="{{ $product->id }}">{{ $product->name }}</option>
							@endforeach
						</select>
					</div> 
					<div class="form-group">
						<label>Component List</label>
						<select class="form-control select2" name="component_list_id">
							<option value="">Choose one</option>
							@foreach ($componentlists as  $componentlist)
							<option value="{{ $componentlist->id }}">{{ $componentlist->name }}</option>
							@endforeach
						</select>
					</div>  
					<div class="form-group">
						<label>Unit</label>
						<input type="text" class="form-control" name="unit" placeholder="type something" required> 
					</div>
					<div class="form-group">
						<label>Value</label>
						<input type="number" class="form-control" name="value" placeholder="type something" required> 
					</div>
					
					<button type="submit" class="btn btn-dark pull-right"><i class="fa fa-check"></i> Submit</button> 					
				</div>
			</div>
		</div>
	</div>
	{{ Form::close() }}
</div>
@endsection