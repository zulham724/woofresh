@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Product</h2>
  </div>
</div>
<div class="container-fluid">
    <div class="card">
    	<div class="card-header">
    		<i class="fa fa-flag"></i> All Product List
    		<a href="{{ route('products.create') }}" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add</a>
    	</div>
    	<div class="card-body">
    		<div class="table-responsive">
    			<table class="table table-striped">
    				<thead>
    					<tr>
    						<td>No</td>
    						<td>Quantity</td>
    						<td>Price</td>
    						<td>Stock</td>
    						<td>Weight</td>
    						<td>Is Available?</td>
    						<td>Action</td>
    					</tr>
    				</thead>
    				<tbody>
    					@foreach ($products as $l => $product)
    					<tr>
							<td>{{ $l+1 }}</td>
							<td>{{ $product->quantity }}</td>
							<td>{{ $product->price }}</td>
							<td>{{ $product->stock }}</td>
							<td>{{ $product->weight }}</td>
							<td>{{ $product->is_available }}</td>
							<td><button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button></td>
						</tr>
						@endforeach
    				</tbody>
    			</table>
    		</div>
    	</div>
    </div>
</div>
@endsection