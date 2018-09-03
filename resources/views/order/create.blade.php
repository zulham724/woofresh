@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Orders</h2>
  </div>
</div>
<div class="container-fluid">
	{{ Form::open(['route'=>['orders.store'],'method'=>'post']) }}
	<div class="row">
		<div class="offset-3 col-6">
			<div class="card">
				<div class="card-header">
					<a href="{{ url('orders') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Back</a>
					<h5 class="pull-right"> Fill the Form</h5>
				</div>
				<div class="card-body"> 
					<div class="form-group">
						<label>Transaction</label>
						<select class="form-control select2" name="transaction_id">
							@foreach ($transactions as $tr => $transaction)
							<option value="{{ $transaction->id }}">{{ $transaction->id }}</option>
							@endforeach
						</select>
					</div>  
					<div class="form-group">
						<label>Product</label>
						<select class="form-control select2" name="product_id">
							@foreach ($products as $product)
							<option value="{{ $product->id }}">{{ $product->name }}</option>
							@endforeach
						</select>
					</div> 
					<div class="form-group">
						<label>Quantity</label>
						<input type="text" class="form-control" name="quantity" placeholder="type something" required> 
					</div>
					<div class="form-group">
						<label>Sub Total Price</label>
						<input type="text" class="form-control" name="subtotal_price" placeholder="type something" required> 
					</div>
					<div class="form-group">
						<label>Discount</label>
						<input type="text" class="form-control" name="discount" placeholder="type something" required> 
					</div>
					<div class="form-group">
						<label>Delivery Fee</label>
						<input type="text" class="form-control" name="delivery_fee" placeholder="type something" required> 
					</div>
					<div class="form-group">
						<label>Total</label>
						<input type="text" class="form-control" name="total" placeholder="type something" required> 
					</div>
					<button type="submit" class="btn btn-dark pull-right"><i class="fa fa-check"></i> Submit</button> 					
				</div>
			</div>
		</div>
	</div>
	{{ Form::close() }}
</div>
@endsection